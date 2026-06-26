<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function create(Event $event)
    {
        $categories = \App\Models\Category::all();

        return view('checkout.create', compact('event', 'categories'));
    }

    public function payment($order_id)
    {
         // Mengambil daftar kategori untuk keperluan menu footer
         $categories = \App\Models\Category::all();

         $transaction = Transaction::with('event')->where('order_id', $order_id)->firstOrFail();
         return view('checkout.payment', compact('transaction','categories'));
    }


   public function store(Request $request, Event $event)
{

    $request->validate([
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'required|email|max:255',
        'customer_phone' => 'required|string|max:20',
    ]);

    if ($event->stock <= 0) {
        return back()->with(
            'error',
            'Mohon maaf, tiket untuk acara ini sudah habis.'
        );
    }

    $orderId = 'TRX-' . time() . '-' . Str::random(5);
    $totalPrice = $event->price + 5000;

    // 1. Simpan transaksi ke database terlebih dahulu
    $transaction = Transaction::create([
        'event_id' => $event->id,
        'order_id' => $orderId,
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'customer_phone' => $request->customer_phone,
        'total_price' => $totalPrice,
        'status' => 'pending',
    ]);

    // 2. Konfigurasi Midtrans
    \Midtrans\Config::$serverKey    = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = false; // Mode Sandbox!
        \Midtrans\Config::$isSanitized  = true;
        \Midtrans\Config::$is3ds        = true;

        \Midtrans\Config::$curlOptions[CURLOPT_SSL_VERIFYHOST] = 0;
        \Midtrans\Config::$curlOptions[CURLOPT_SSL_VERIFYPEER] = 0;
        \Midtrans\Config::$curlOptions[CURLOPT_HTTPHEADER] = [];

    // 3. Susun data transaksi
    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => $totalPrice,
        ],
        'customer_details' => [
            'first_name' => $request->customer_name,
            'email' => $request->customer_email,
            'phone' => $request->customer_phone,
        ],
    ];

    try {

        // 4. Generate Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // 5. Simpan Snap Token ke database
        $transaction->update([
            'snap_token' => $snapToken
        ]);

        // 6. Redirect ke halaman pembayaran
        return redirect()->route(
            'checkout.payment',
            $transaction->order_id
        );

    } catch (\Exception $e) {

        return back()->with(
            'error',
            'Gagal memproses pembayaran: ' . $e->getMessage()
        );
    }
}
public function success($order_id)
{
    $categories = \App\Models\Category::all();

    $transaction = Transaction::with('event')
        ->where('order_id', $order_id)
        ->firstOrFail();

    // cek status dari Midtrans
    \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    \Midtrans\Config::$isProduction = false;

    try {
        $status = \Midtrans\Transaction::status($order_id);

        if (in_array($status->transaction_status, ['capture', 'settlement'])) {
            $transaction->update([
                'status' => 'success'
            ]);
        }
    } catch (\Exception $e) {
        return redirect()->route('home')
            ->with('error', 'Transaksi tidak ditemukan');
    }

    return view('checkout.success', compact('transaction', 'categories'));
}
}

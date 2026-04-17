<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    // Merender halaman detail event
    public function show()
    {
        return view('event-detail');
    }

    // Merender halaman checkout
    public function checkout()
    {
        return view('checkout');
    }

    // Merender halaman ticket 
    public function ticket()
    {
        return view('ticket');
    }
}
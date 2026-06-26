<?php
namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::with('category')->findOrFail($id);

        return view('event-detail', [
            'event' => $event
        ]);
    }

    public function checkout()
    {
        return view('checkout');
    }
}

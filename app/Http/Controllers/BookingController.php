<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function book(Request $request)
    {
        if (!Session::has('user')) return response()->json(['error' => 'Unauthorized'], 401);

        $user = Session::get('user');
        $event = Event::find($request->event_id);

        if (!$event || $event->available_seats <= 0) {
            return response()->json(['error' => 'No seats available'], 400);
        }

        
        Booking::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'booking_time' => now(),
        ]);

        
        $event->decrement('available_seats');

        return response()->json(['success' => 'Ticket Booked']);
    }

    public function history()
    {
        if (!Session::has('user')) return redirect('/login');

        $user = Session::get('user');
        $bookings = Booking::where('user_id', $user->id)
            ->with('event') 
            ->orderBy('booking_time', 'desc')
            ->paginate(5);

        return view('bookings', compact('bookings'));
    }
}

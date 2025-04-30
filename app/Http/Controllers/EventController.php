<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if (!Session::has('user')) return redirect('/login');

        $events = Event::paginate(6);

        if ($request->ajax()) {
            return view('partials.events', compact('events'))->render();
        }

        return view('events', compact('events'));
    }

    public function book(Request $request)
    {
        if (!Session::has('user')) {
            return response()->json(['error' => 'Please login to book tickets.']);
        }

        $event = Event::find($request->event_id);

        if (!$event || $event->available_seats <= 0) {
            return response()->json(['error' => 'Booking failed. Event full or not found.']);
        }

        $event->available_seats -= 1;
        $event->save();

        return response()->json(['success' => 'Ticket booked successfully!']);
    }
}

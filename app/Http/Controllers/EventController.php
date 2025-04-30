<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function index()
    {
        if (!Session::has('user')) return redirect('/login');

        $events = Event::all();  

        return view('events', compact('events'));
    }
}

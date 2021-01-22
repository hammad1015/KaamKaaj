<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Event;
use App\User;


class EventController extends Controller
{

    public function index(Event $event)
    {
        $channels = $event->channels;

        return view('pages.event', [
            'event'    => $event,
            'channels' => $channels,
        ]);
    }

    public function create(Request $request)
    {

        /* ----------------get------------------- */
        if ($request->isMethod('get'))
        {
            return view('pages.new-event');
        }
        
        /* ----------------post------------------- */
        // validating request
        $this->validate($request, [
            'name'      => 'required',
            'budget'    => 'required',
            'email'     => 'required|email', 
        ]);
        
        // creating user entry in the database
        $event = Event::create([
            'name'      => $request->name,
            'budget'    => $request->budget,
            'email'     => $request->email,
            'location'  => $request->location,
            'details'   => $request->datails,
        
        ]);

        // current user has authorization level of 0 by default (team lead)
        Auth::user()->events()->save($event);
        
            
        // redirecting to event page
        return redirect()->route('event', $event);
    }

    public function addParticipant(Event $event, Request $request)
    {
        
        // validating request
        $this->validate($request, [
            'email'                 => 'required|email', 
            'authorization_level'   => 'required',
        ]);
            
        // finding user
        $user = User::where('email', $request->email)->first();
        
        // add user to the event
        $user->events()->save($event, array('authorization_level' => $request->authorization_level));

        return back();
    }

    public function delete(Event $event)
    {
        // delete event
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Event;


class EventController extends Controller
{
    public function index(Event $event)
    {
        // dd("inside event index with id \n $event");

        // $event    = Event::find($id);
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
        
        ]);#->users()->save(Auth::user());

        // current user has authorization level of 0 by default (team lead)
        Auth::user()->events()->save($event);
        
            
        // redirecting to event page
        return redirect()->route('event', $event->id);
    }


}

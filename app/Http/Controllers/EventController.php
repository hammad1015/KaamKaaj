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
        $level    = Auth::user()->events()->where('event_id', $event->id)->first()->pivot->authorization_level;

        return view('pages.event', [
            'level'    => $level,
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

        $this->authorize('addParticipant', $event);

        // validating request
        $this->validate($request, [
            'email'                 => 'required|email', 
            'authorization_level'   => 'required',
        ]);
            
        // finding user
        $user = User::where('email', $request->email)->first();
        
        // add user to the event
        $user->events()->save($event, array('authorization_level' => $request->authorization_level));

        return back()->with('status', 'participant successfully added');
    }

    public function removeParticipant(Event $event)
    {
        # code...
    }

    public function listParticipants(Event $event)
    {
        $users  = $event->users;
        // $levels = $user->events()->where('event_id', $event->id)->first()->pivot->authorization_level;

        return view('pages.participants', [
            'users'  => $users,
            // 'levels' => $levels,
        ]);
    }

    public function leave(Event $event)
    {
        $this->authorize('leave', $event);

        $event->users()->detach(Auth::user()->id);

        return redirect(route('profile'))->with('status', 'Event successfully left');
    }

    public function delete(Event $event)
    {
        $this->authorize('delete', $event);

        $event->delete();

        return redirect(route('profile'))->with('status', 'event successfully deleted');
    }
}

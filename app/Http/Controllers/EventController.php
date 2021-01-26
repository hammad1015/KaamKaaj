<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Event;
use App\User;
use App\Mail\BroadcastMail;


class EventController extends Controller
{

    public function index(Event $event)
    {
        $channels = $event->channels;
        $level    = $event->users()->where('user_id', Auth::user()->id)->first()->pivot->authorization_level;

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
            'email'     => 'required|email|unique:events', 
        ]);
        
        // creating user entry in the database
        $event = Event::create([
            'name'      => $request->name,
            'budget'    => $request->budget,
            'email'     => $request->email,
            'location'  => $request->location,
            'details'   => $request->details,
        
        ]);

        // current user has authorization level of 0 by default (team lead)
        Auth::user()->events()->save($event);
        
            
        // redirecting to event page
        return redirect()->route('event', $event)->with('status', 'event successfully created');
    }

    public function addParticipant(Event $event, Request $request)
    {

        $this->authorize('addParticipant', $event);

        // validating request
        $this->validate($request, [
            'email'                 => 'required|email|exists:users', 
            'authorization_level'   => 'required',
        ]);
            
        // finding user
        $user = User::where('email', $request->email)->first();
        
        // add user to the event
        $user->events()->save($event, array('authorization_level' => $request->authorization_level));

        return back()->with('status', 'participant successfully added!');
    }

    public function removeParticipant(Event $event, User $user)
    {
        $this->authorize('removeParticipant', [$event, $user]);

        $event->users()->detach($user->id);

        return back()->with('status', 'participant successfully removed');
    }

    public function searchParticipant(Event $event, Request $request)
    {

        $this->validate($request, [
            'search' => 'required',
        ]);

        $users = $event->users()->where('name', 'like', '%'.$request->search.'%')->get();

        return view('pages.participants', [
            'event' => $event,
            'users' => $users,
        ]);

    }

    public function listParticipants(Event $event)
    {
        $users  = $event->users;


        return view('pages.participants', [
            'event' => $event,
            'users' => $users,
        ]);
    }

    public function leave(Event $event)
    {
        $this->authorize('leave', $event);

        $event->users()->detach(Auth::user()->id);

        return redirect()->route('profile')->with('status', 'Event successfully left');
    }

    public function delete(Event $event)
    {
        $this->authorize('delete', $event);

        $event->delete();

        return redirect()->route('profile')->with('status', 'event successfully deleted');
    }

    public function broadcastEmail(Event $event, Request $request)
    {
        if ($request->isMethod('get')){
            
            return view('pages.broadcast', [
                'event' => $event
                ]);
        }

        $this->validate($request, [
            'subject'    => 'required',
            'content'    => 'required',
            'recipients' => 'required',
        ]);
        
        $base_level = $event->users()->where('user_id', Auth::user()->id)->first()->pivot->authorization_level;

        // dd($base_level);
        
        if ($request->recipients == 'everyone' ){ 
            $recipients = $event->users; 
        }
        if ($request->recipients === 'above'    ){ 
            $recipients = $event->users()->where('authorization_level', '<=', $base_level)->get(); 
        }
        if ($request->recipients === 'below'    ){ 
            $recipients = $event->users()->where('authorization_level', '>=', $base_level)->get(); 
        }

        foreach ($recipients as $recipient){
            Mail::to($recipient)->send(new BroadcastMail($event, $request->content));
        }

        return back()->with('status', 'email successfully broadcasted');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Channel;
use App\Event;

class ChannelController extends Controller
{
   
    public function index(Event $event, Channel $channel)
    {
        $posts = $channel->posts->reverse();

        return view('pages.channel', [
            'event'   => $event,
            'channel' => $channel,
            'posts'   => $posts,
        ]);
    }

    public function create(Event $event, Request $request)
    {

        // validating request
        $this->validate($request, [
            'name'                  => 'required', 
            'authorization_level'   => 'required',
        ]);

        // creating channel model
        $channel = Channel::make([
            'name'                  => $request->name,
            'authorization_level'   => $request->authorization_level,
        ]);

        // adding the channel to the current event
        $event->channels()->save($channel);

        return back()->with('status', 'Channel successfully created');            
    }

    
}

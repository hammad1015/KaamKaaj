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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
    }
}

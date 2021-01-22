@extends('base')
@section('content')
    

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">{{ $event->name }}</h1>
        <p class="lead">{{ $event->email }}</p>
    </div>
</div>

{{-- form to add participant to the event --}}
<form action="{{ route('new-participant', $event) }}" method="POST">

    @csrf

    <div class="input-group mb-3">
        <input 
            type="text" 
            name="email" 
            class="form-control" 
            placeholder="Participant's email"
        >
        <input 
            type="number" 
            name="authorization_level" 
            class="form-control" 
            placeholder="Participant's authorization level"
        >
        <div class="input-group-append">
            <button type="submit" class="btn btn-dark" type="button">Add Participant</button>
        </div>
    </div>

</form>

{{-- form to add channel to the event --}}
<form action="{{ route('new-channel', $event) }}" method="POST">

    @csrf

    <div class="input-group mb-3">
        <input 
            type="text" 
            name="name" 
            class="form-control" 
            placeholder="Channel Name"
        >
        <input 
            type="number" 
            name="authorization_level" 
            class="form-control" 
            placeholder="Channel's authorization level"
        >
        <div class="input-group-append">
            <button type="submit" class="btn btn-dark" type="button">Add Chaannel</button>
        </div>
    </div>

</form>

{{-- list of channels --}}
@if ($channels->count())
<div class="jumbotron jumbotron-fluid">

    <h1 class="display-4">Channels: </h1>

    @foreach ($channels as $channel)
    <div class="container container col-12 col-md-8">
        <h1 class="display-4">{{ $channel->name }}</h1>
        {{-- <p class="lead">{{ $event->email }}</p> --}}
        <a href="{{ route('channel', [$event, $channel]) }}"> link </a>
    </div>
    @endforeach

</div>
@endif

@endsection
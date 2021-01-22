@extends('base')
@section('content')
    

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">{{ $event->name }}</h1>
        <p class="lead">{{ $event->email }}</p>
        <p class="lead">level: {{ $level }}</p>

        <a class="ml-3" href="{{ route('leave'    , $event) }}">Leave Event</a>
        @can('delete', $event)
        <a class="ml-3" href="{{ route('event-del', $event) }}">delete event</a>
        @endcan
    </div>
</div>

<a href="{{ route('participants', $event) }}" class="btn btn-dark">List of Participants</a>
<br>
<br>


{{-------------------------------- form to add participant to the event -----------------------------}}
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
            <button 
                type="submit" 
                class="btn btn-dark" 
                type="button"
                style="width: 140px"

                >Add Participant
            </button>
        </div>
    </div>

</form>


{{-------------------------------- form to add channel to the event -----------------------------}}
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
            <button 
                type="submit" 
                class="btn btn-dark" 
                type="button"
                style="width: 140px"

                >Add Channel
            </button>
        </div>
    </div>

</form>

{{---------------------------- list of channels ----------------------------}}
@if ($channels->count())
<div class="jumbotron jumbotron-fluid">

    <h1 class="display-4">Channels: </h1>

    @foreach ($channels as $channel)
    @can('view', $channel)

    <div class="container container col-12 col-md-8">
        <h1 class="display-4">{{ $channel->name }}</h1>
        <a href="{{ route('channel', [$event, $channel]) }}"> link </a>
    </div>

    @endcan
    @endforeach

</div>
@else

@endif


@endsection
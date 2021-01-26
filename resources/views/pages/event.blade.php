@extends('base')
@section('content')
    

<div class="jumbotron jumbotron-fluid p-5 round">

    <div class="container ">

        <a class="display-4">{{ $event->name }}</a>
        <p class="lead"      >{{ $event->email }}</p>

        <p class="lead">your level: {{ $level }}</p>

        <div class="row">

                <a 
                    href="{{ route('participants', $event) }}" 
                    class="btn btn-warning mx-1" 
                    style="border-radius: 50px"

                    >List of Participants  
                </a>
                <a
                    href="{{ route('broadcast', $event) }}" 
                    class="btn btn-warning mx-1" 
                    style="border-radius: 50px"

                    >Broadcast Email
                </a>

 


                <a href="{{ route('leave'       , $event) }}" class="mx-2 my-2 text-danger">Leave Event          </a>
                @can('delete', $event)
                <a href="{{ route('del-event'   , $event) }}" class="mx-2 my-2 text-danger">Delete event         </a>
                @endcan


            
        </div>

    </div>



</div>



{{-------------------------------- form to add participant to the event -----------------------------}}
<form action="{{ route('new-participant', $event) }}" method="POST">

    @csrf

    {{-- @foreach ($errors->default->get('email') as $err)
        <span class="text-danger pt-0 pb-3">{{ $err }}</span>
    @endforeach
    @foreach ($errors->default->get('authorization_level') as $err)
        <span class="text-danger pt-0 pb-3">{{ $err }}</span>
    @endforeach --}}
    <div class="input-group mb-3">
        <input 
            type="text" 
            name="email" 
            class="form-control round" 
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
                class="btn btn-warning round" 
                type="button"
                style="width: 140px"

                >Add Participant
            </button>
        </div>
    </div>
</form>


{{-------------------------------- form to add channel to the event -----------------------------}}
<form
    action="{{ route('new-channel', $event) }}" 
    method="POST"
    >

    @csrf

    {{-- @foreach ($errors->default->get('name') as $err)
        <span class="text-danger pt-0 pb-3">{{ $err }}</span>
    @endforeach
    @foreach ($errors->default->get('authorization_level') as $err)
        <span class="text-danger pt-0 pb-3">{{ $err }}</span>
    @endforeach --}}
    <div class="input-group mb-3">
        <input 
            type="text" 
            name="name" 
            class="form-control round" 
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
                class="btn btn-warning round" 
                type="button"
                style="width: 140px"

                >Add Channel
            </button>
        </div>
    </div>

</form>

{{---------------------------- list of channels ----------------------------}}
@if ($channels->count())
<div class="jumbotron jumbotron-fluid round">

    <h1 class="display-4 pl-3">Channels: </h1>

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
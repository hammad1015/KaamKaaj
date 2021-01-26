@extends('base')
@section('content')

{{-- <style>
    .event-link {
        color: black;
        font-weight: 600;
    }
    .event-link:hover {
        text-decoration: none;
        color: aqua;
    }
</style> --}}
{{-- <a href="{{ route('event', $event) }}" class="btn btn-warning"><< Back to Event</a> --}}

<h1 
    {{-- href="{{ route('event', $event) }}" --}}
    class="event-link display-4 text-secondary"
    >{{ $channel->name }}:
</h1>



<form 
    action="{{ route('new-post', [$event, $channel]) }}" 
    method="POST"
    class="py-3"
    >

    @csrf

    <div class="input-group">
        <textarea
            name="content" 
            class="form-control"
            placeholder="Post an Update" 
            style="height: 20rem"
        ></textarea>
    </div>
    <br>

    <button type="submit" class="btn btn-warning round {{--float-right--}}" style="width: 10%">Post</button>
{{-- <a href="{{ route('event', $event) }}" class="btn btn-warning"><< Back to Event</a> --}}


</form>
<div class="my-3">

    @foreach ($posts as $post)
    <div class="card my-3">
        <div class="card-body">
            {{ $post->content }}
        </div>
    </div>
    @endforeach

</div>

@endsection
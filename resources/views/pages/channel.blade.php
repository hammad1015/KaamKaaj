@extends('base')
@section('content')


<form action="{{ route('new-post', [$event, $channel]) }}" method="POST">

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

<a href="{{ route('event', $event) }}" class="btn btn-dark"><< Back to Event</a>

<button type="submit" class="btn btn-outline-dark float-right" style="width: 10%">Post</button>

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
@extends('base')
@section('content')


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">{{ $user->name }}</h1>
        <p class="lead">{{ $user->email }}</p>
    </div>
</div>

@if ($events->count())
<div class="jumbotron jumbotron-fluid">

    <h1 class="display-4">Events: </h1>

    @foreach ($events as $event)
    <div class="container container col-12 col-md-8">
        <h1 class="display-4">{{ $event->name }}</h1>
        <p class="lead">{{ $event->email }}</p>
        <a href="{{ route('event', $event) }}"> link </a>
    </div>
    @endforeach

</div>
@endif
    
@endsection
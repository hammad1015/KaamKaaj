@extends('base')
@section('content')


<div class="jumbotron jumbotron-fluid p-5 round">
    <div class="container">

        <h1 class="display-4">{{ $user->name  }}</h1>
        <p  class="lead"     >{{ $user->email }}</p>

        <a  href="{{  route('del-user')  }}" class="text-danger"> delete account </a>

    </div>
</div>

@if ($events->count())
<div class="jumbotron jumbotron-fluid round">

    <h1 class="display-4 pl-3">Events: </h1>

    @foreach ($events as $event)
    <div 
        class="container border-bottom border-dark my-3 pb-2 col-12 col-md-8"
    >
        <h1 class="display-4">{{ $event->name }}</h1>
        <p class="lead">{{ $event->email }}</p>
        <a href="{{ route('event', $event) }}"> link </a>

    </div>
    
    @endforeach

</div>
@endif
    
@endsection
@extends('base')
@section('content')
    
<div class="my-3">

    @foreach ($users as $user)
    <div class="card my-3">
        <div class="card-body">
            {{ $user->name }}
            {{-- {{ $level }} --}}
            {{-- <a class="float-right" href="">remove</a> --}}
        </div>
    </div>
    @endforeach

</div>

@endsection
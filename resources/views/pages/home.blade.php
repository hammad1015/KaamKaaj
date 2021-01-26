@extends('base')
@section('content')


<div class="row ">

    <div class="col-12 col-md-6 left">
        <img
            class="img-fluid"
            src="{{ asset('imgs/Worktime-cuate.png') }}"
        >
    </div>
        
    <div
        class="text-center col-12 col-md-6 right"
        style="margin-top: 30%"
        >
        <h1>
            manage your
            <br>
            tasks
        </h1>
        <h4>
            Schedule all your events at a click
        </h4>
        <a 
            href="{{ route('profile') }}"
            class="btn btn-warning" 
            style="border-radius: 25px;">get started
        </a>
    </div>    
</div>

@endsection
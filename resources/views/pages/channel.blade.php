@extends('base')
@section('content')

@foreach ($posts as $post)
<div class="card">
    <div class="card-body">
        {{ $post->content }}
    </div>
</div>
@endforeach

@endsection
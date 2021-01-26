@extends('base')
@section('content')

<form
    action="{{ route('search-participant', $event) }}"
    class="form-inline" 
    style=""
    method="POST"
    >

    @csrf

    <input 
        name='search'    
        class="form-control mr-sm-2" 
        type="search" 
        placeholder="Search"
        style="border-radius: 50px"

    >

    <button 
        class="btn btn-outline-warning my-2 my-sm-0" 
        type="submit"
        style="border-radius: 50px"

        >Search
    </button>
</form>

<div class="my-3">

    @foreach ($users as $user)
    <div class="card my-3" style="border-radius: 50px">
        <div class="card-body">

            {{ $user->pivot->authorization_level }} :
            {{ $user->name }} 

            @can('removeParticipant', [$event, $user])
                <a 
                    class="float-right text-danger" 
                    href="{{ route('del-participant', [$event, $user]) }}"
                >remove
            </a>
            @endcan
            
        </div>
    </div>
    @endforeach

</div>

@endsection
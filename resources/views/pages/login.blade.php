@extends('base')
@section('form')


login

<form 
    action="{{ route('login') }}" 
    method="post"
    >

    @if (session('status'))
        {{ session('status') }}
    @endif

    @csrf

	<div class="form-group">
		<label>Email address</label>
        <input 
            type="email" 
            name="email" 
            class="form-control" 
            placeholder="Enter email" 
            value="{{  old('name')  }}"
        >
        @error('email')
            -------------need email
        @enderror

	</div>
	<div class="form-group">
		<label>Password</label>
        <input 
            type="password" 
            name="password" 
            class="form-control" 
            placeholder="Password" 
        >
        @error('password')
            ----------------need password
        @enderror

    </div>

	<button type="submit" class="btn btn-dark">Log in</button>
	
</form>


@endsection
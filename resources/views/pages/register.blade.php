@extends('base')
@section('form')


register

<form 
    action="{{ route('register') }}" 
    method="post"
    >

    @csrf

    <div class="form-group">
        <label> Name </label>
        <input 
            type="text" 
            name="name"
            class="form-control"
            placeholder="Enter Name"
            value="{{  old('name')  }}"
        >
        @error('name')
            ----------enter name
        @enderror

    </div>
	<div class="form-group">
		<label>Email address</label>
        <input 
            type="email" 
            name="email" 
            class="form-control" 
            placeholder="Enter email" 
            value="{{  old('email')  }}"
        >
        @error('email')
            ----------enter email
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
            ----------password mismatch
        @enderror

    </div>
    <div class="form-group">
		<label>Confirm Password</label>
        <input 
            type="password" 
            name="password_confirmation" 
            class="form-control" 
            placeholder="Confirm Password" 
        >

	</div>

	<button type="submit" class="btn btn-dark">Sign up</button>
	
</form>

    
@endsection
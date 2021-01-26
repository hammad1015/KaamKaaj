@extends('base')
@section('content')

<div class="row">

    <div class="text-center col-12 col-md-4 left">

        <h1> login </h1>

        <form 
            class="border border-warning bg-grey p-3 round"
            style="background-color: #c6c7c8;"
            action="{{ route('login') }}" 
            method="post"
            >

            @csrf

            <div class="form-group">
                <label>Email address</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control @error('email') border border-danger @enderror" 
                    placeholder="Enter email" 
                    value="{{  old('email')  }}"
                    
                >
                @foreach ($errors->default->get('email') as $err)
                    <span class="text-danger">{{ $err }}</span>
                @endforeach

            </div>
            <div class="form-group">
                <label>Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="form-control @error('password') border border-danger @enderror" 
                    placeholder="Password" 
                >
                @foreach ($errors->default->get('password') as $err)
                    <span class="text-danger">{{ $err }}</span>
                @endforeach

            </div>

            <button type="submit" class="btn btn-warning" style="  border-radius: 25px;">Log in</button>
            
        </form>

    </div>

    <div class="col-12 col-md-8 right">
        <img 
            class="img-fluid"
            src="{{ asset('imgs/Usabilitytesting-cuate.png') }}"
        >
    </div>

</div>

@endsection
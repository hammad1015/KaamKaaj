@extends('base')
@section('content')

<div class="row">

    <div class="col-12 col-md-8 left">
        <form 
            action="{{ route('new-event') }}" 
            method="POST"
            style="height: 100%"
            >

            @csrf

            @foreach ($errors->default->get('name') as $err)
                <span class="text-danger pt-0 pb-3">{{ $err }}</span>
            @endforeach
            <div class="input-group form-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text round">@</span>
                </div>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control round @error('name') border border-danger @enderror" 
                    placeholder="Event Name"
                    value="{{ old('name') }}"
                >
            </div>
            

            @foreach ($errors->default->get('budget') as $err)
                <span class="text-danger">{{ $err }}</span>
            @endforeach  
            <div class="input-group form-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text round">$</span>
                </div>
                <input 
                    type="number" 
                    name="budget" 
                    class="form-control @error('budget') border border-danger @enderror" 
                    placeholder="Budget"
                    value="{{ old('budget') }}"
                >
                <div class="input-group-append">
                    <span class="input-group-text round">.00</span>
                </div>
            </div>


            @foreach ($errors->default->get('email') as $err)
                <span class="text-danger">{{ $err }}</span>
            @endforeach
            <div class="input-group form-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text round">News Letter</span>
                </div>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control @error('email') border border-danger @enderror" 
                    placeholder="Event Email"
                    value="{{ old('email') }}"
                    >
                <div class="input-group-append">
                    <span class="input-group-text round"> @example.com </span>
                </div>
            </div>
            <br>

            <label>Additional Information</label>

            <div class="input-group mb-3">
                <input 
                    type="text" 
                    name="location" 
                    class="form-control round" 
                    placeholder="Event's location"
                    value="{{ old('location') }}"
                >
            </div>

            <div class="input-group">
                <textarea
                    name="details" 
                    class="form-control round py-3"
                    placeholder="Event Details" 
                    style="height: 20rem"

                    >{{ old('details') }}</textarea>
            </div>
            <br>

            <button 
                type="submit" 
                class="btn btn-warning round"
                
                >Create new Event
            </button>
            <br>

        </form>
    </div>

    <div class="col-12 col-md-4 right">
        <img 
            class="img-fluid"
            src="{{ asset('imgs/Visualdata-cuateSmol.png') }}"
            >
    </div>
    
</div>

    
@endsection
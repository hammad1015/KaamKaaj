@extends('base')
@section('form')

new event

<form action="{{ route('new-event') }}" method="POST">

    @csrf

    <div class="input-group form-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">@</span>
        </div>
        <input 
            type="text" 
            name="name" 
            class="form-control" 
            placeholder="Event Name"
        >
        @error('name')
            -------------------name required
        @enderror

    </div>
  
    <div class="input-group form-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">$</span>
        </div>
        <input 
            type="number" 
            name="budget" 
            class="form-control" 
            placeholder="Budget"
        >
        <div class="input-group-append">
            <span class="input-group-text">.00</span>
        </div>

        @error('budget')
            -------------------budget required
        @enderror

    </div>
  
    <div class="input-group form-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">News Letter</span>
        </div>
        <input 
            type="email" 
            name="email" 
            class="form-control" 
            placeholder="Event Email"
            >
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">@example.com</span>
        </div>

        @error('email')
            -------------------email required
        @enderror

    </div>
    <br>
  
    <label>Additional Information</label>
  
    <div class="input-group mb-3">
        <input 
            type="text" 
            name="location" 
            class="form-control" 
            placeholder="Event's location"
        >
        {{-- <div class="input-group-append">
            <button class="btn btn-dark" type="button">Add Participant</button>
        </div> --}}
    </div>
  
    <div class="input-group">
        <textarea
            name="datails" 
            class="form-control"
            placeholder="Event Details" 
            style="height: 20rem"
        ></textarea>
    </div>
    <br>
  
    <button type="submit" class="btn btn-dark">Create new Event</button>
    <br>
  
</form>
    
@endsection
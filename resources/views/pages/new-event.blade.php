@extends('base')
@section('content')

new event

<form action="" method="POST">

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
    </div>
  
    <div class="input-group form-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Event Lead</span>
        </div>
        <input 
            type="email" 
            name="lead" 
            class="form-control" 
            placeholder="username"
            >
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">@example.com</span>
        </div>
    </div>
    <br>
  
    <label>Additional Information</label>
  
    <div class="input-group mb-3">
        <input 
            type="text" 
            name="participant" 
            class="form-control" 
            placeholder="Participant's username"
        >
        <div class="input-group-append">
            <button class="btn btn-dark" type="button">Add Participant</button>
        </div>
    </div>
  
    <div class="input-group">
        <textarea 
            name="datails" 
            class="form-control" 
            placeholder="Event Details" 
            aria-label="With textarea"
        >
        </textarea>
    </div>
    <br>
  
    <button type="submit" class="btn btn-dark">Create new Event</button>
    <br>
  
</form>
    
@endsection
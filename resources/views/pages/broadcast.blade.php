@extends('base')
@section('content')

<form 
    action="{{ route('broadcast', $event) }}"
    method="POST"
>
    @csrf

    <label>Subject: </label>

    <div class="form-group">
        <div class="input-group mb-3">
            <input 
                type="text" 
                name="subject" 
                class="form-control round px-3" 
                placeholder="Email's Subject"
                value="{{ old('subject') }}"
            >
        </div>
        @foreach ($errors->default->get('subject') as $err)
            <span class="text-danger px-3">{{ $err }}</span>
        @endforeach
    </div>

    <label>Content: </label>

    <div class="form-group">
        <div class="input-group">
            <textarea
                name="content" 
                class="form-control round py-3 px-4"
                placeholder="Email Content" 
                style="height: 20rem"

                >{{ old('content') }}</textarea>
        </div>
        @foreach ($errors->default->get('content') as $err)
            <span class="text-danger px-3">{{ $err }}</span>
        @endforeach
    </div>
    <br>


    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button 
                    type="submit" 
                    class="btn btn-warning round"
                
                    >Send!
                </button>        
            </div>
            <select 
                class="custom-select round"
                name="recipients"
            >

                <option value="" selected>Send to...</option>

                <option value="everyone">Everyone       </option>
                <option value="below"   >Everyone below </option>
                <option value="above"   >Everyone above </option>
            </select>
        </div>
        @foreach ($errors->default->get('recipients') as $err)
            <span class="text-danger px-3">{{ $err }}</span>
        @endforeach
    </div>
    <br>

</form>

@endsection
@component('mail::message')

{{ $content }}

@component('mail::button', ['url' => '{{ route("event", $event) }}'])
    Goto Event 
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

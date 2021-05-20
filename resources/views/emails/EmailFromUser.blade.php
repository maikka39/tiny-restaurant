@component('mail::message')
    <p>Naam: {{ $name }}</p>
    <p>Project: {{$project}}</p>
    <p>Bericht: {{ $message }} </p>
@endcomponent
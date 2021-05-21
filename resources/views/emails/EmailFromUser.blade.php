@component('mail::message')
    <p>Naam: {{ $name }}</p>
    <p>Project: {{$project}}</p>
    <p>
        Bericht:<br>
        {{ $message }}
    </p>
@endcomponent
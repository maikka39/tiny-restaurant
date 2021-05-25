@component('mail::message')
    <p>Naam: {{$firstname}} {{$lastname}}</p>
    <p>Project: {{$project}}</p>
    <p>
        Bericht:<br>
        {{ $message }}
    </p>
@endcomponent
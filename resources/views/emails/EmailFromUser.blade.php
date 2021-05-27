@component('mail::message')
    <p>Naam: {{$firstname}} {{$lastname}}</p>
    @if ($project != "")
        <p>Project: {{$project}}</p>
    @endif
    <p>
        Bericht:<br>
        {{ $message }}
    </p>
@endcomponent
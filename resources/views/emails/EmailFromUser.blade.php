@component('mail::message')

    # Email van {{ $name }}

    {{ $topic }}

    Met vriendelijke groet,
    {{ $name }}
@endcomponent
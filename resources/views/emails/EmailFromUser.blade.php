@component('mail::message')

    # Beste Tiny Restaurant,

    {{ $topic }}

    Met vriendelijke groet,
    {{ $name }}
@endcomponent
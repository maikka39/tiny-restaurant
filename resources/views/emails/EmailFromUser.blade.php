@component('mail::message')

    # Beste Tiny Restaurant,

    {{ $message }}

    Met vriendelijke groet,
    {{ $name }}
@endcomponent
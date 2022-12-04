<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

@component('mail::message')
    <h3> New message form {{$contact['email']}}</h3>
    <p>Name {{$contact['name']}}</p>
    <p>phone {{$contact['phone']}}</p>
    <p>Message: {{$contact['message']}}</p>
@endcomponent
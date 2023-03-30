<x-mail::message>
<h1>Message from website:</h1>
    <x-mail::panel>
        <p>Name:{{request()->name}}</p>
        <p>Email:{{request()->email}}</p>
        <p>Message:{{request()->message}}</p>
    </x-mail::panel>

{{--    kleuren zijn primary, succes en error hieronder--}}
<x-mail::button :url="'https://www.google.be'" color="success">
Bezoek onze site
</x-mail::button>

Bedankt,<br>
Het team van {{ config('app.name') }}
</x-mail::message>

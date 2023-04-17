<x-mail::message>
<h1>Message from website:</h1>
    <x-mail::panel>
        <p>Name:{{$data['name']}}</p>
        <p>Email:{{$data['email']}}</p>
        <p>Message:{{$data['message']}}</p>
    </x-mail::panel>

{{--    kleuren zijn primary, succes en error hieronder--}}
<x-mail::button :url="'https://www.google.be'" color="success">
Bezoek onze site
</x-mail::button>

Bedankt,<br>
Het team van {{ config('app.name') }}
</x-mail::message>

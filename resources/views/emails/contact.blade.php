<x-mail::message>
<h1>Message from website www.google.be</h1>
   <x-mail::panel>
       <p>Name:{{request()->name}}</p>
       <p>Name:{{request()->email}}</p>
       <p>Name:{{request()->message}}</p>
   </x-mail::panel>
{{--    primary, success en error--}}
<x-mail::button :url="''" color="success">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

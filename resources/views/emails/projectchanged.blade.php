@component('mail::message')
# Projekt adatok megváltoztak

{{$contents}}

Üdvözlettel,<br>
{{ config('app.name') }}
@endcomponent

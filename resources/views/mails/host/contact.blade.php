@component('mail::message')
Dear {{ $host->name }}

Guest {{ $guest->name }} is looking for your help as a host family.

In order to get in contact with {{ $guest->name }}, you can simply reply to this e-mail.

Kind Regards,

iof volunteers
@endcomponent

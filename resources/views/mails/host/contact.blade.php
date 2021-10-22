@component('mail::message')
Dear {{ $host->name }}

Guest {{ $guest->name }} is looking for your help as a host family.

Further details:

Name: {{ $guest->name }} <br />
Country: {{ $guest->country->name }}<br />
Birthdate: {{ $guest->birthdate }}<br />
OL-Experience: since {{ $guest->ol_duration }}<br />
Motivation: {{ $guest->motivation }}

In order to get in contact with {{ $guest->name }}, you can simply reply to this e-mail.

Kind Regards,

iof volunteers
@endcomponent

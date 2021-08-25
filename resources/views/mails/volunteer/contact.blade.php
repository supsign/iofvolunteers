@component('mail::message')
Dear {{ $volunteer->name }}

{{ $user->firstname }} {{ $user->lastname }} is looking for your help at {{ $projekt->name }}.<br/>
You can simply reply to this e-mail to get in contact with the organisation.<br/><br/>

Kind Regards,<br/><br/>

iof volunteers
@endcomponent
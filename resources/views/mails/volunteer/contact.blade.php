@component('mail::message')
Dear {{ $volunteer->name }}

{{ $user->firstname }} {{ $user->lastname }} is looking for your help at {{ $project->name }}.
You can simply reply to this e-mail to get in contact with the organisation.

Kind Regards,

iof volunteers
@endcomponent

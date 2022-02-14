@component('mail::message')
Dear {{ $project->contact }}

The volunteer {{ $user->firstname }} {{ $user->lastname }} is interested in helping you with your project {{ $project->name }}.
To learn more about the volunteer, have a look at IOF’s Connecting Worldwide volunteer platform.

In order to get in contact with the interested volunteer, you can simply reply to this e-mail.

Kind Regards,

iof volunteers
@endcomponent

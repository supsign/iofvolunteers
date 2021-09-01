@component('mail::message')
Dear {{ $volunteer->name }}

{{ $user->firstname }} {{ $user->lastname }} is looking for your volunteer help with project {{ $project->name }}.
To learn more about this project, go to IOF’s Connecting Worldwide volunteer platform and search for the project called {{ $project->name }}.

In order to get in contact with the responsible person of this project, you can simply reply to this e-mail.

Kind Regards,

iof volunteers
@endcomponent

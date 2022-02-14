@component('mail::message')
Dear {{ $project->contact }}

The volunteer {{ $volunteer->name }} is interested in helping you with your project {{ $project->name }}.
To learn more about the volunteer, have a look at IOF’s Connecting Worldwide volunteer platform and visit <a href="{{ route('volunteer.show', $volunteer) }}">{{ $volunteer->name }}</a>.

In order to get in contact with the interested volunteer, you can simply reply to this e-mail.

Kind Regards,

iof volunteers
@endcomponent

<?php

namespace App\Mail;

use App\Models\Project;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactVolunteerMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Volunteer $volunteer, public User $user, public Project $project)
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.volunteer.contact')->subject('Volunteering Opportunity')->replyTo(
            $this->project->organisation_email
        )->from('no-reply@volunteers.orienteering.sport')->cc('mail@volunteers.orienteering.sport');
    }
}

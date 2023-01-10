<?php

namespace App\Mail;

use App\Models\Project;
use App\Models\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactProjectMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Project $project, public Volunteer $volunteer)
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
        return $this
            ->markdown('mails.project.contact')
            ->subject('Volunteering Opportunity')
            ->replyTo($this->project->organisation_email)
            ->from('mail@volunteers.orienteering.sport')
            ->bcc('mail@volunteers.orienteering.sport');
    }
}

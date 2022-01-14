<?php

namespace App\Mail;

use App\Models\Guest;
use App\Models\Host;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactHostMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public Host $host, public User $user, public Guest $guest)
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
        return $this->markdown('mails.host.contact')->subject('Hosting Opportunity')->replyTo(
            $this->user->guest->email
        )->from('no-reply@volunteers.orienteering.sport')->bcc('mail@volunteers.orienteering.sport');
    }
}

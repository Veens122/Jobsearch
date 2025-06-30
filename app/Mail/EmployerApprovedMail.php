<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmployerApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $employer;

    /**
     * Create a new message instance.
     */
    public function __construct($employer)
    {
        $this->employer = $employer;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your employer account has been approved')
            ->view('emails.employer-approved');
    }
}

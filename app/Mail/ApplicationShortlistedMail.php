<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationShortlistedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Shortlisted',
        );
    }

    public function content(): Content
    {
        $candidateUser = $this->application->candidateProfile?->user;

        if (!$candidateUser) {
            // Log or throw exception - candidate user not found
            throw new \Exception("Candidate user not found for application ID {$this->application->id}");
        }

        return new Content(
            markdown: 'emails.application.shortlisted',
            with: [
                'candidate' => $candidateUser,
                'job' => $this->application->job,
                'applicationDate' => $this->application->created_at->format('F j, Y'),
            ],
        );
    }




    public function attachments(): array
    {
        return [];
    }
}
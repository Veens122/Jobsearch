<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CandidateShortlisted extends Notification implements ShouldQueue
{
    use Queueable;

    protected $application;

    /**
     * Create a new notification instance.
     */
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('You have been shortlisted!')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Congratulations! You have been shortlisted for a job you applied for.')
            ->action('View Application', url('/candidate/applications'))
            ->line('Thank you for using our platform!');
    }

    /**
     * Get the database representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'message' => 'You have been shortlisted for a job you applied for.',
            'url' => '/candidate/applications',
            'job_id' => $this->application->job_id ?? null,
            'application_id' => $this->application->id ?? null,
        ];
    }
}
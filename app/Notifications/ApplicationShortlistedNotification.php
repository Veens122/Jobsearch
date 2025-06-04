<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Request;

class ApplicationShortlistedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('Your job Application has been Shortlisted')
            ->markdown('emails.application_shortlisted', [
                'candidate' => $notifiable,
                'job' => $this->application->job,
            ]);
    }



    public function toDatabase($notifiable)
    {
        return [
            'application_id' => $this->application->id,
            'job_title' => $this->application->job->title,
            'message' => 'Your application for "' . $this->application->job->title . '" has been shortlisted.',

            // If this route is deleted the email comes without any url and the candidate cannot view the job details
            // 'url' => route('candidate.applications.show', $this->application->id),
        ];
    }

    public function updateStatus(Request $request, $applicationId, $status)
    {
        $application = Application::findOrFail($applicationId);
        $application->status = $status;
        $application->save();

        // Notify candidate if shortlisted
        if ($status === 'shortlisted') {
            $candidate = $application->user; // or $application->candidate if named that way
            $candidate->notify(new ApplicationShortlistedNotification($application));
        }

        return back()->with('success', 'Application updated successfully.');
    }
}
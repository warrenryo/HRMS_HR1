<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\JobPostingCandidate\Candidates;

class HRMailer extends Mailable
{
    use Queueable, SerializesModels;
    public $candidate;
    public $date;
    public $time;
    public $via;
    public $link;
    public $firstname;
    public $lastname;
    public $job;
    /**
     * Create a new message instance.
     */
    public function __construct(Candidates $candidate, $date, $time, $via, $link, $firstname, $lastname, $job)
    {
        $this->candidate = $candidate;
        $this->date = $date;
        $this->time = $time;
        $this->via = $via;
        $this->link = $link;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->job = $job;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hotel Paradise Interview Scheduled',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.Mailer',  // Define your view here
            with: [
                'candidateName' => $this->candidate->name,
                'date' => $this->date,
                'time' => $this->time,
                'via' => $this->via,
                'link' => $this->link,
                'firstname' => $this->firstname,
                'lastname'=> $this->lastname,
                'job' => $this->job
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

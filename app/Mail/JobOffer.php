<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobOffer extends Mailable
{
    use Queueable, SerializesModels;
    public $date;
    public $time;
    public $firstname;
    public $lastname;
    public $job;
    /**
     * Create a new message instance.
     */
    public function __construct($date, $time, $firstname, $lastname, $job)
    {
        $this->date = $date;
        $this->time = $time;
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
            subject: 'ParadiseHotel Job Offer for '.$this->job,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.JobOffer',  // Define your view here
            with: [
                'date' => $this->date,
                'time' => $this->time,
                'firstname' => $this->firstname,
                'lastname'=> $this->lastname,
                'job' => $this->job,
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

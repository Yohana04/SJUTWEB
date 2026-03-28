<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $contentBody;
    public $url;
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct($title, $contentBody, $url, $type)
    {
        $this->title = $title;
        $this->contentBody = $contentBody;
        $this->url = $url;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New ' . $this->type . ': ' . $this->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.content_notification',
            with: [
                'title' => $this->title,
                'contentBody' => $this->contentBody,
                'url' => $this->url,
                'type' => $this->type,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

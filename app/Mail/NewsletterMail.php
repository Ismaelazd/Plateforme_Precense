<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $newsletter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($news)
    {
        $this->newsletter = $news;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@mgconnect.com')->subject('Vous êtes maintenat inscrit à notres MG-Connect newsletter')->view('mail.newsletterMail',compact('newsletter'));
    }
}

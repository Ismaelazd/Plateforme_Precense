<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReceptionMail extends Mailable
{
    use Queueable, SerializesModels;
    public $formulaire;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form)
    {
        $this->formulaire = $form; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->formulaire->email)->subject($this->formulaire->sujet)->view('mail.receptionMail',compact('formulaire'));
    }
}

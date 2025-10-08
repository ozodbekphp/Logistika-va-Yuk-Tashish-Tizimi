<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable  implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
   public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Xush kelibsiz!')
                    ->view('emails.welcome') // FOLDER nomi 'emails'
                    ->with(['user' => $this->user]);
    }
}

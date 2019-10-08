<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailResetToken extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usr, $tk)
    {
        //
        $this->user = $usr;
        $this->token = $tk;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from('supports@fotoquest.org')
            ->view('emails.resettoken');
    }
}

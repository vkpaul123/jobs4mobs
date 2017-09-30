<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class verifyEmailSocial extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $oAuthConfig;

    public function __construct($user, $oAuthConfig)
    {
        $this->user = $user;
        $this->oAuthConfig = $oAuthConfig;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('verifyEmailSocial')
        ->with(compact('user'))
        ->with(compact('oAuthConfig'));
    }
}

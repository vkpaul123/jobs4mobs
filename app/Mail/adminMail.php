<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class adminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $mailToName = $request->mailToName;
        $mailBody = $request->mailBody;

        return $this->markdown('email')
        ->with(compact('mailToName'))
        ->with(compact('mailBody'))
        ->to($request->mailTo)
        ->subject($request->toSubject);

        //return $this->markdown('email');
    }
}

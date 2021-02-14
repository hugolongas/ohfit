<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InfoResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name, $email, $subject,$mes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name,string $email, string $subject, string $message)
    {
        $this->name = $name;
       $this->subject = $subject;
       $this->mes = $message;
       $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($address=$this->email,$name=$this->name)
                    ->subject($this->subject)
                    ->view('emails.infoResponse');
    }
}

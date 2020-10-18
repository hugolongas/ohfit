<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
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
        return $this->from($this->email)->view('emails.contact')->subject($this->subject);
    }
}

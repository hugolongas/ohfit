<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Product;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $email, $name, $dni, $birth_date, $phone, $profession, $address, $form_info;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $prod, string $subject)
    {
        $this->subject = $subject;
        
        $this->email = $prod->email;
        $this->name = $prod->name;
        $this->dni = $prod->dni;
        $this->birth_date = $prod->birth_date;
        $this->phone = $prod->phone;
        $this->profession = $prod->profession;
        $this->address = $prod->address;
        $this->form_info = json_decode($prod->form_info,true);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->view('emails.product')->subject($this->subject);
    }
}

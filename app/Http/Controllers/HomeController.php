<?php

namespace App\Http\Controllers;

use App\Colaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\ContactMail;
use App\Opinion;

class HomeController extends Controller
{
    public function Index()
    {
        $colaborators = Colaborator::all();
        $opinions = Opinion::all();
        return view('home')->with("opinions",$opinions);
    }

    public function Method(){
        return view('metodo');
    }
    
    public function Team(){
        return view('equipo');
    }

    public function Enterprises(){
        return view('empresas');
    }

    public function PoliticaPrivacidad(){
        return view('politicaPrivacidad');
    }

    public function PoliticaCookie(){
        return view('politicaCookies');
    }

    
    public function SendContact(Request $request)
    {
        $mailConfig = \Config::get('mail.contact');
        $emailTo =  $mailConfig['address'];
        $name = $request->input('name');
        $subject = $request->input('subject');
        $email = $request->input('email');
        $message = $request->input('message');
        Mail::to($emailTo)->send(new ContactMail($name,$email,$subject,$message));
    }

    public function Complete()
    {
        return view('complete');
    }

}

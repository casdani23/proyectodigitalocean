<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Mail\Markdown;

class MailtrapController extends Controller
{
  

public function sendEmail()
{
    Mail::send([], [], function (Message $message) {
        $markdown = new Markdown(view(), config('email.vistaCode'));

        $message->to('laravel@mailtrap.io')
            ->subject('Prueba de correo electrónico')
            ->setBody($markdown->render('email.vistaCode'), 'text/html');
    });
 
    return "Correo electrónico enviado";
}

}

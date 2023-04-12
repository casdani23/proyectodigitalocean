<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Expr\Cast\String_;

class Codigoverificacionemail extends Mailable
{
    use Queueable, SerializesModels;

      public $subject = "Este es el codigo de verificacion";
      public $code;
      public $mensaje;

    /**
     * Create a new message instance.
     */
    public function __construct(String $code)
    {
        $this->code = $code;



    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Codigoverificacionemail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
{
    $user = Auth::user();
    if ($user->id === 1) {
        return new Content(
            view: 'email.vistaGetToken',
           
        );
    } else if($user->id === 2) {
        return new Content(
            view: 'email.VistaTokenSupervisor',
           
        );
    }
    return new Content(
        view: 'email.vistaCode',
    );
}







    

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

 
}

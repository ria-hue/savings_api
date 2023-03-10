<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class savingMail extends Mailable
{
    use Queueable, SerializesModels;
     
    public $user ;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this-> user= $user;
   
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            // subject: 'Saving Mail',
                from: new Address('jeffrey@example.com', 'Savings Api'),
                subject: 'sign up ',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {

        return new Content(
            view: 'email.test ',
            with: [
                'id' => $this->user->id,
               
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        // return [];
    }

    // public function build()
    // {
    //     // return $this->from('emailTesting@gmail.com','hello world')
    //     // ->subject($this->data['subject'])->view('email.test')
    //     // ->with('data',$this->data);
    //     return $this->subject('Mail from ItSolutionStuff.com')
    //     ->view('emails.test');
    // }
}

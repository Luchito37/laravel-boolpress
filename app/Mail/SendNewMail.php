<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_post)
    {
        $this->post = $_post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.newMail', [
            "post" => $this->post,
            "user" => $this->post->user
        ])
        ->subject("Creazione nuovo post avvenuta :" . $this->post->title);
    }
}

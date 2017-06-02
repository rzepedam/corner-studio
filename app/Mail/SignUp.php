<?php

namespace CornerStudio\Mail;

use CornerStudio\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SignUp extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var $password
     */
    public $password;

    /**
     * @var \CornerStudio\User $user
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @param $password
     * @param User $user
     */
    public function __construct($password, User $user)
    {
        $this->password = $password;
        $this->user     = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bienvenido')
                    ->markdown('emails.sign_up');
    }
}

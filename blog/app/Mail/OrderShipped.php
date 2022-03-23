<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('thitt24@wru.vn')
            ->with([
                'user' => $this->user,
            ])
//            ->attach('images/faces/face1.jpg', [
//                'as' => 'name.jpg',
//                'mime' => 'application/image'
//            ])
            ->view('mail.order_shipped');
//            ->text('mail.order_shipped');

        $this->withSwiftMessage(function ($message) {
           $message->getHeaders()
               ->addTextHeader('Custom-Header', 'HeaderValue');
        });
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function build()
    {
        return $this->subject('Order Confirmation')
            ->view('emails.order_confirmation')
            ->with(['session' => $this->session]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\cabin\Cabin;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $cabin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cabin)
    {
        $this->cabin = $cabin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.BookingInfo')->with('cabin',$this->cabin);
    }
}

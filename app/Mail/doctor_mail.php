<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\doctor\doctor;
use Illuminate\Queue\SerializesModels;

class doctor_mail extends Mailable
{
    use Queueable, SerializesModels;
    public $doctor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(doctor $doctor)
    {
        $this->doctor=$doctor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.doctor_mail')->with('doctor',$this->doctor);
    }
}

<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @param Appointment $appointment
     * @param string $messageContent
     */
    public function __construct(Appointment $appointment, $messageContent)
    {
        $this->appointment = $appointment;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Appointment Notification')
            ->view('emails.appointment-notification');
    }
}

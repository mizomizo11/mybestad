<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ConsultationMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $consultation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($consultation)
    {
        $this->consultation = $consultation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject( $this->consultation->subject)
            ->view('site.emails.report_email');



      //  return  view('site.contact_email');
    }
}

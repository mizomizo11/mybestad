<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ReportMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('site.emails.report_email')
            ->subject('تم كتابة التقرير')  //<= how to pass variable on this subject
            ->with([
                'note'     => $this->content["notification"], //this works without queue
                'link'     => $this->content["link"], //this works without queue
            ]);
    }





}

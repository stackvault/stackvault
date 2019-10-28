<?php

namespace App\Mail;

use App\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PagespeedEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $page;
    /**
     * Create a new message instance.
     *
     * @param Page $page
     * @return void
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(['address' => 'no-reply@stackvault.io', 'name' => config('app.name')])
            ->subject('Verify your e-mail')
            ->view('mail.pagespeed.verification');
    }
}

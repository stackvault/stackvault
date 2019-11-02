<?php

namespace App\Mail;

use App\EmailVerificationCode;
use App\Page;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PagespeedEmailVerification extends Mailable
{
    protected $page;
    protected $code;

    protected $theme = 'default';
    /**
     * Create a new message instance.
     *
     * @param Page $page
     * @param EmailVerificationCode $verificationCode
     * @return void
     */
    public function __construct(Page $page, EmailVerificationCode $verificationCode)
    {
        $this->page = $page;
        $this->code = $verificationCode->code;
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
            ->view('mail.pagespeed.verification', ['page' => $this->page, 'code' => $this->code]);
    }
}

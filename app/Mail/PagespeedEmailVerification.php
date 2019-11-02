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
        app('log')->info('Building e-mail');
        app('log')->info('Queue: ' . print_r(config('queue'), true));
        app('log')->info('Queues: ' . print_r(config('queues'), true));
        app('log')->info('Connection: ' . print_r(config('connection'), true));
        app('log')->info('Connections: ' . print_r(config('connections'), true));

        return $this
            ->from(['address' => 'no-reply@stackvault.io', 'name' => config('app.name')])
            ->subject('Verify your e-mail')
            ->view('mail.pagespeed.verification');
    }
}

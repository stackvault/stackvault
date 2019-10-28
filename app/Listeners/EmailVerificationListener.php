<?php

namespace App\Listeners;

use App\Events\SendEmailVerification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailVerificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the SendEmailVerification event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendEmailVerification $event)
    {

    }
}

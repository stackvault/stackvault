<?php

namespace App\Listeners;

use App\EmailVerificationCode;
use App\Events\PageCreated;
use App\Mail\PagespeedEmailVerification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendVerificationEmail implements ShouldQueue
{
    /**
     * Handle the SendEmailVerification event.
     *
     * @param  PageCreated  $event
     * @return void
     */
    public function handle(PageCreated $event)
    {
        $event->page->verificationCodes()->save($code = new EmailVerificationCode(['code' => EmailVerificationCode::createCode()]));
        return Mail::to($event->page->email)
            ->sendNow(new PagespeedEmailVerification(
                $event->page,
                $code
            ));
    }
}

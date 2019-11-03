<?php

namespace App\Observers;

use App\EmailVerificationCode;
use Illuminate\Foundation\Bus\DispatchesJobs;

class EmailVerificationCodeObserver
{
    use DispatchesJobs;

    public function creating(EmailVerificationCode $evc)
    {
        /**
         * Delete any previous verification codes for this page
         * @var $oldVerification EmailVerificationCode
         */
        foreach(EmailVerificationCode::where('page_id', $evc->page_id)->get() as $oldVerification) {
            $oldVerification->delete();
        }

    }

}

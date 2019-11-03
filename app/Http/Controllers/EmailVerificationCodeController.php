<?php

namespace App\Http\Controllers;

use App\EmailVerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmailVerificationCodeController extends Controller
{
    public function verifyEmail(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $code = $request->get('code');
        $evc = EmailVerificationCode::where('code', $code)->first();
        if ($evc instanceof EmailVerificationCode) {
            $evc->update(['date_email_confirmed' => $now = Carbon::now()]);
            $evc->page()->update(['date_email_confirmed' => $now]);
            // ToDo: Make a sucess view
            echo "Successfully validated";
        } else {
            abort(402);
        }
    }
}

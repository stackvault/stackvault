<?php

namespace App\Http\Controllers;

use App\EmailVerificationCode;
use App\Page;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageSpeedController extends Controller
{
    public function index()
    {
        return view('pagespeed/index');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'url' => "starts_with:http://,https://|active_url|required",
                'email' => "email|required"
            ]);
            $page = new Page();
            $page->email = $request->get('email');
            $page->url = $request->get('url');
            $page->newsletter_opted_in = (bool) $request->get('updates');
            $page->saveOrFail();
            return new JsonResponse(['success' => true, 'id' => $page->id]);
        } catch (Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], 422);
        }
    }


    public function validateUrl(Request $request)
    {
        // ToDo: Spam protection
        if (!$request->has('url')) {
            abort(400);
        }

        $url = $request->get('url');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        return new JsonResponse(curl_getinfo($ch));
    }
}

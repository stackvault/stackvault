<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageSpeedController extends Controller
{
    public function index()
    {
        return view('pagespeed/index');
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

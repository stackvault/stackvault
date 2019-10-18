<?php

namespace App\Http\Controllers;

use App\Page;
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
        $this->validate($request, [
            'url' => "required",
            'email' => "required"
        ]);
        $page = new Page();
        $page->email = $request->get('email');
        $page->url = $request->get('url');
        $page->newsletter_opted_in = (bool) $request->get('updates');
        $page->saveOrFail();
        return new JsonResponse(['success' => true, 'id' => $page->id]);
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

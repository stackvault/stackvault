@extends('layouts.app')
@section('product')
    <span class="font-normal"><i class="fas fa-caret-right mr-2 ml-2"></i><a href="/pagespeed" class="text-white">pagespeed</a></span>
@endsection
@section('content')
    <div class="bg-blue-800 text-gray-200 p-5">
        <div class="w-full mb-4 text-center">
            <span class="font-display">pagespeed</span> automatically sends you vital updates on your sites performance, direct to your e-mail.
        </div>
        <pagespeed-form></pagespeed-form>
    </div>
    <div class="p-5 text-sm rounded">
        <h3 class="text-lg">
            Why should I use <span class="font-display">pagespeed</span>?
        </h3>
        <p>Well, first of all, this product is <span class="font-bold">100% completely free</span>. Also, now more than ever, Googles ranking is largely affected by things like page load speed, and making sure your site is both ranked well on Google, and running smoothly for your end users is vital.</p>
        <h3 class="text-lg mt-3">What updates will I receive?</h3>

        You'll receive daily updates from <span class="font-display">pagespeed</span> including the following top metrics:
        <ul>
            <li>&bullet; Average load speed</li>
            <li>&bullet; Number of failed requests</li>
            <li>&bullet; Time to load assets (css/js)</li>
            <li>&bullet; Something else</li>
        </ul>
    </div>
@endsection

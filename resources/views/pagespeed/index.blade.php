@extends('layouts.app')
@section('subtitle', 'pagespeed')
@section('top-panel')
    <div class="text-gray-200 p-5 shadow">
        <!--div class="w-full mb-4 text-center">
            <span class="block font-display text-2xl">pagespeed</span>
            <span class="block font-base">Get the vital updates you need on your webpage, directly to your inbox each morning, without any bills or hassle.</span>
        </div-->
        <pagespeed-form></pagespeed-form>
    </div>
@endsection
@section('content')
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
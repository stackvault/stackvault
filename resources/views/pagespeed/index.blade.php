@extends('layouts.app')
@section('subtitle', 'pagespeed')

@section('content')
    <div class="text-base md:text-sm bg-gray-200 shadow-inner py-6">
        <div class="flex flex-col-reverse md:flex-row md:justify-between">
            <div class="text-indigo-900 md:w-2/5 flex flex-col flex-wrap">
                <h3 class="text-lg p-3 pl-5  shadow-inner md:rounded-tr-lg md:rounded-br-lg bg-indigo-900 text-white">
                    Why should I use <span class="font-display">pagespeed</span>?
                </h3>
                <p class="p-5">Well, first of all, this product is <span class="font-bold">100% completely free</span>. Also, now more than ever, Googles ranking is largely affected by things like page load speed, and making sure your site is both ranked well on Google, and running smoothly for your end users is vital.</p>
                    <h3 class="text-lg p-3 pl-5 shadow-inner md:rounded-tr-lg md:rounded-br-lg bg-indigo-900 text-white">What updates will I receive?</h3>
                <p class="p-5">
                    You'll receive daily updates from <span class="font-display">pagespeed</span> including the following top metrics:
                    <ul class="px-5">
                        <li>&bullet; Average load speed</li>
                        <li>&bullet; Number of failed requests</li>
                        <li>&bullet; Time to load assets (css/js)</li>
                        <li>&bullet; Something else</li>
                    </ul>
                </p>
            </div>
            <div class="text-indigo-900 pb-8 md:pl-20 md:ml-10">
                <h1 class="font-display text-xl mt-3 mb-8 text-center font-bold antialiased tracking-wider"><span class="hidden md:inline-block">Quick, Reliable, and </span> Free daily pagespeed analysis</h1>
                <div class="bg-indigo-900 inner-shadow shadow text-white text-lg md:pr-10 md:rounded-tl-lg md:rounded-bl-lg p-6 pt-8">
                    <pagespeed-form>

                    </pagespeed-form>
                </div>
            <!--pagespeed-form></pagespeed-form-->
                <p class="p-6">
                We'll run daily page speed tests on your site, and e-mail you a full report including many key analytic insights, all 100% free
                </p>
            </div>
        </div>

    </div>
@endsection
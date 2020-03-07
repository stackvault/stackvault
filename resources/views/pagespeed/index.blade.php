@extends('layouts.app')
@section('subtitle', 'pagespeed')

@section('content')
    <div class="text-base md:text-sm bg-gray-200 shadow-inner md:border-l-2 md:border-r-2 md:border-white py-6">
        <div class="flex flex-col-reverse md:flex-row md:justify-between">
            <div class="text-indigo-900 w- md:w-2/5 flex flex-col flex-wrap">
                <h3 class="-ml-1 text-lg p-3 rounded-tr-lg rounded-br-lg bg-indigo-900 text-white">
                    Why should I use <span class="font-display">pagespeed</span>?
                </h3>
                <p class="p-5">Well, first of all, this product is <span class="font-bold">100% completely free</span>. Also, now more than ever, Googles ranking is largely affected by things like page load speed, and making sure your site is both ranked well on Google, and running smoothly for your end users is vital.</p>
                <h3 class="-ml-1 text-lg p-3 rounded-tr-lg rounded-br-lg bg-indigo-900 text-white">What updates will I receive?</h3>
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
                <h1 class="font-display text-xl mb-5 font-bold antialiased tracking-wider">Quick, Free, and Reliable daily pagespeed analysis</h1>
                <div class="bg-indigo-900 inner-shadow shadow text-white text-lg -mr-1 rounded-tl-lg rounded-bl-lg p-6">
                    <form class="flex flex-col align-right">
                        <label for="email" class="flex justify-end">
                            <span class="my-auto">URL</span>
                            <input class="w-3/4 ml-3 py-2 px-5 rounded" type="text" name="url" placeholder="https://google.com/page">
                        </label>
                        <label for="email" class="flex justify-end mt-3">
                            <span class="my-auto">E-mail</span>
                            <input class="w-3/4 ml-3 py-2 px-5 rounded" type="text" name="email" placeholder="technical@company.com">
                        </label>
                        <label for="subscribe" class="flex justify-end my-auto mt-3">
                            <div class="w-3/4 ml-3 text-xs flex justify-end">
                                <span class="pr-4 my-auto">I would like to be notified about other similar upcoming products</span>
                                <input class="h-6 w-6 bg-white rounded-lg cursor-pointer" type="checkbox" name="subscribe">
                            </div>
                        </label>
                        <input class="font-display border border-indigo-600 inner-shadow md:w-1/3 mr-0 ml-auto bg-indigo-200 hover:bg-indigo-300 cursor-pointer text-indigo-900 rounded py-3 px-5 mt-3" type="submit" value="Complete">
                    </form>
                </div>
            <!--pagespeed-form></pagespeed-form-->
                <p class="p-6">
                We'll run daily page speed tests on your site, and e-mail you a full report including many key analyic insights, all 100% free
                </p>
            </div>
        </div>

    </div>
@endsection
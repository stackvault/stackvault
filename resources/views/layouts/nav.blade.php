<div class="bg-repeat pt-10 md:pt-0 shadow-lg" style="background-image: url('/images/dark-honeycomb.png');">
    <nav class="absolute md:relative top-0 w-full text-gray-200 flex justify-between py-1 px-3 opacity-75">
        <header class="text-2xl font-display font-bold"><span class="hidden sm:inline-block">stackvault </span>
            @if(View::hasSection('subtitle'))
                <span class="font-normal"><i class="fas fa-caret-right mr-2 ml-2"></i> @yield('subtitle')</span>
            @endif
        </header>
        <div class="block md:hidden"><i class="cursor-pointer mt-1 text-2xl fas fa-bars"></i></div>
        <ul class="hidden md:flex flex-inline mt-2 text-base">
            <li class="mr-2 cursor-pointer hover:text-white hover:font-bold">
                <a href="/">
                    Home
                </a>
            </li>
            <li class="mr-2 cursor-pointer hover:text-white hover:font-bold">
                <a href="{{ route('pagespeed.index') }}">
                    Pagespeed
                </a>
            </li>
            <li class="cursor-pointer hover:text-white hover:font-bold">Something Else</li>
        </ul>
    </nav>
    @yield('top-panel')
</div>
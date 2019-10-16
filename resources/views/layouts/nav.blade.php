<nav class="absolute md:relative top-0 shadow w-full text-gray-200 flex bg-gray-800 justify-between py-1 px-3">
    <header class="text-2xl font-display font-bold"><a href="/" class="text-white">stackvault</a> @yield('product')</header>
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
        <li class="cursor-pointer hover:text-white hover:font-bold">Something Else Awesome</li>
    </ul>
</nav>

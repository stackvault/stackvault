<div class="bg-repeat pt-10 md:pt-0 shadow-lg" style="background-image: url('/images/dark-honeycomb.png');">
    <nav class="absolute md:relative top-0 w-full text-gray-200 flex justify-between py-1 px-3 opacity-75">
        <header class="text-2xl font-display font-bold"><span class="hidden sm:inline-block"><a href="/" class="text-white">stackvault</a></span>
            @if(View::hasSection('subtitle'))
                <span class="font-normal"><i class="fas fa-caret-right mr-2 ml-2"></i> @yield('subtitle')</span>
            @endif
        </header>

        <div class="block md:hidden"><i v-on:click="openMobileNav()" class="cursor-pointer mt-1 text-2xl fas fa-bars"></i></div>

        <ul class="hidden md:flex flex-inline mt-2 text-base">
            @foreach($navLinks as $link)
            <li class="mr-2 cursor-pointer hover:text-white hover:font-bold">
                <a href="{{ $link['url'] }}">
                    {{ $link['name'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </nav>
    @yield('top-panel')
</div>

<div class="absolute right-0 top-0 w-full h-screen flex" v-show="mobileNavOpen">
    <div v-on:click="closeMobileNav()" class="w-1/2 bg-gray-800 opacity-50">

    </div>
    <div class="flex-1 bg-blue-400 font-display text-xl shadow p-5" style="opacity: 0.95">
        <ul class="text-center">g
        @foreach($navLinks as $link)
            <li class="mb-4 cursor-pointer">
                <a href="{{ $link['url'] }}">
                    {{ $link['name'] }}
                </a>
            </li>
        @endforeach
        </ul>
    </div>
</div>
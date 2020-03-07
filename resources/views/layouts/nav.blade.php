<div class="p-5 bg-indigo-900 rounded-b-sm inner-shadow shadow">
    <nav class="md:max-w-6xl mx-auto flex justify-between">
        <header class="text-2xl font-display font-bold">
            @if(View::hasSection('subtitle'))
                <span>@yield('subtitle')</span>
            @else
                <span><a href="/" class="text-white">stackvault</a></span>
            @endif
        </header>

        @yield('center-nav')

        <div class="block md:hidden"><i v-on:click="openMobileNav()" class="cursor-pointer mt-1 text-2xl fas fa-bars"></i></div>

        <ul class="hidden md:flex flex-inline my-auto text-base">
            @foreach($navLinks as $link)
            <li class="mr-2 cursor-pointer hover:text-white hover:font-bold">
                <a href="{{ $link['url'] }}">
                    {{ $link['name'] }}
                </a>
            </li>
            @endforeach
        </ul>
        <div v-show="mobileNavOpen">
            <div v-on:click="closeMobileNav()" class="w-1/2 bg-gray-800 opacity-50">

            </div>
            <div class="flex-1 bg-blue-400 font-display text-xl shadow" style="opacity: 0.95">
                <ul class="text-center">
                    @foreach($navLinks as $link)
                        <a href="{{ $link['url'] }}">
                            <li class="p-5 cursor-pointer hover:text-gray-200 hover:bg-blue-600 hover:opacity-100">
                                {{ $link['name'] }}
                            </li>
                        </a>

                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    @yield('top-panel')
</div>


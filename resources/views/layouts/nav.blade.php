<div class="p-5 bg-indigo-900 rounded-b-sm inner-shadow shadow">
    <nav class="md:max-w-6xl mx-auto tracking-wider">
        <div class="flex justify-between">
        <header class="text-3xl font-display font-bold">
            @if(View::hasSection('subtitle'))
                <span>@yield('subtitle')</span>
            @else
                <span><a href="/" class="text-white">stackvault</a></span>
            @endif
        </header>

        @yield('center-nav')

        <div class="block md:hidden"><i v-on:click="toggleMobileNav()" class="cursor-pointer mt-1 text-2xl fas fa-bars"></i></div>

        <div class="hidden md:flex flex-row w-full flex-no-wrap justify-end text-lg">
            @foreach($navLinks as $link)
                <a class="@if(url()->current() == $link['url']) font-bold text-white @else text-gray-300 @endif mx-4 my-2 hover:font-bold hover:text-white" href="{{ $link['url'] }}">
                    {{ $link['name'] }}
                </a>
        @endforeach

        </div>
        </ul>
        </div>
        <div v-show="mobileNavOpen">
            <div class="flex flex-row w-full flex-no-wrap justify-center text-xl">
                @foreach($navLinks as $link)
                    <a class="@if(url()->current() == $link['url']) font-bold text-white @else text-gray-300 @endif mx-4 my-2 hover:font-bold hover:text-white" href="{{ $link['url'] }}">
                    {{ $link['name'] }}
                    </a>
                @endforeach
                </ul>
            </div>
        </div>
    </nav>

    @yield('top-panel')
</div>


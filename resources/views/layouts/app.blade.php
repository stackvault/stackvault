<html>
<head>
    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @stack('styles')
    <script type="text/javascript" src="{{ mix('/js/app.js') }}" defer></script>
    @stack('scripts')
    @include('layouts.analytics')
</head>
<body class="bg-gray-600">
    <div id="app" class="md:mx-auto md:max-w-6xl font-body text-gray-200">
        @include('layouts.nav')
        <div class="text-base">
            @yield('content')
        </div>
        <footer class="text-gray-200 bg-indigo-900 rounded-br-sm rounded-bl-sm p-3 text-xs flex justify-center">
            This site is owned and operated by <span class="font-display font-bold mx-1">stackvault</span> and we don't care what you think
        </footer>
    </div>
</body>
</html>

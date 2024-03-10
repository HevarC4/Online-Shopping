<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body>
    <div id="app" dir="rtl" class="flex h-screen">
        <div class="bg-green-600 h-screen basis-2/12 text-white relative ">
            <p class="text-xl text-center font-bold mt-2 border-b pb-3">
                جلوبەرگ
            </p>
            <div class="mt-3 mx-3">
                <a href="{{ route('user.index') }}" > بەکارهێنەر</a>
            </div>
            <form class="absolute bottom-5 w-full text-center" id="logout-form" action="{{ route('logout') }}"
                method="POST" class="d-none">
                @csrf
                <button class="bg-white text-green-600 w-11/12 p-2 px-4 rounded-lg ">چونەدەرەوە</button>
            </form>
        </div>
        <div class="basis-9/12 px-14 py-8">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>

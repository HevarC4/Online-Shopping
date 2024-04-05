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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="app" dir="rtl" class="flex h-screen">
        <div class="bg-green-600 h-screen basis-2/12 text-white relative text-center">
            <p class="text-xl text-center font-bold mt-2 border-b pb-3">
                جلوبەرگ
            </p>
            <div class="">
                <div class="mt-3 p-2 m-1 {{ in_array(Route::currentRouteName(),['dashboard'])?'bg-gray-800 rounded-lg':'' }}">
                    <a href="{{ route('dashboard') }}"> داشبۆرد</a>
                </div>
                <div class="mt-3 p-2 m-1 {{ in_array(Route::currentRouteName(),['user.index','user.create','user.edit'])?'bg-gray-800 rounded-lg':'' }}">
                    <a href="{{ route('user.index') }}"> بەکارهێنەر</a>
                </div>
                <div class="mt-3 p-2  m-1 {{ in_array(Route::currentRouteName(),['category.index','category.create','category.edit'])?'bg-gray-800 rounded-lg': ''}}">
                    <a href="{{ route('category.index') }}"> بەشەکان</a>
                </div>
                <div class="mt-3 p-2  m-1 {{ in_array(Route::currentRouteName(),['post.index','post.create','post.edit'])?'bg-gray-800 rounded-lg':'' }}">
                    <a href="{{ route('post.index') }}"> کاڵاکان</a>
                </div>
            </div>

            <form class="absolute bottom-5 w-full text-center" id="logout-form" action="{{ route('logout') }}"
                method="POST" class="d-none">
                @csrf
                <button class="bg-white text-green-600 w-11/12 p-2 px-4 rounded-lg hover:bg-gray-800 hover:text-white">چونەدەرەوە</button>
            </form>
        </div>
        <div class="w-full px-10 py-6">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>

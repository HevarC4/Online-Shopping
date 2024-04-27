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

    <script defer src="{{ asset('js/cleanSearch.js') }}"></script>
    <script defer src="{{ asset('js/nextItem.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body dir="rtl" class="bg-gray-100/50">
    <div class="flex justify-between items-center px-2 pb-1 pt-2 border-b-2">
        <div class="basis-7/12 flex justify-between">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <div class="h-10 w-10 rounded-full bg-green-600 text-white flex items-center justify-center">
                    <i class="fa-solid fa-shirt"></i>
                </div>
                <p class="font-bold">
                    جلوبەرگ
                </p>
            </div>
            <div class="space-x-3 rtl:space-x-reverse text-gray-500/70 pt-2">
                <a href="{{ route('index') }}"
                    class="link-item text-gray-700 pb-4 border-b-2 border-green-600">فرۆشگا</a>
                <a href="#" class="link-item">داواکردن</a>
                <a href="#" class="link-item">شوێن</a>
                <a href="#" class="link-item">بلۆک</a>
                <a href="#" class="link-item">یارمەتی</a>
            </div>
        </div>
        <div
            class="basis-3/12 text-left text-xl flex justify-end space-x-5 rtl:space-x-reverse text-gray-500 items-center ">
            @auth
                <div class="relative">
                    <i onclick="showModalUser('FavModal')" class="fa-solid fa-cart-shopping cursor-pointer"></i>
                    @if (count($dtFav) > 0)
                        <p
                            class="w-3 h-3 bg-red-500 rounded-full -top-1 absolute text-white text-xs text-[8px] text-center ">
                            {{ count($dtFav) }}
                        </p>

                        <div id="FavModal"
                            class="absolute top-10 hidden -left-6 w-72 max-h-56 overflow-y-scroll bg-white p-2 space-y-2 mt-2 rounded-xl z-10">
                            @foreach ($dtFav as $row)
                                <div dir="ltr"
                                    class="shadow-sm rounded-lg py-2  px-2 flex items-center justify-between text-sm hover:bg-gray-100 hover:shadow-lg">
                                    <div>
                                        <img class="w-16 object-cover h-16 rounded-lg"
                                            src="{{ asset('posts/' . $row->post->image) }}"alt="">
                                    </div>
                                    <div class="items-center text-center basis-3/10 text-black ">
                                        <p>{{ $row->post->title }}</p>
                                        <p>{{ $row->post->price }}$</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="relative">
                    <i onclick="showModalUser('FavModal')" class="fas fa-heart cursor-pointer"></i>
                    @if (count($dtFav) > 0)
                        <p
                            class="w-3 h-3 bg-red-500 rounded-full -top-1 absolute text-white text-xs text-[8px] text-center ">
                            {{ count($dtFav) }}
                        </p>

                        <div id="FavModal"
                            class="absolute top-10 hidden -left-6 w-72 max-h-56 overflow-y-scroll bg-white p-2 space-y-2 mt-2 rounded-xl z-10">
                            @foreach ($dtFav as $row)
                                <div dir="ltr"
                                    class="shadow-sm rounded-lg py-2  px-2 flex items-center justify-between text-sm hover:bg-gray-100 hover:shadow-lg">
                                    <div>
                                        <img class="w-16 object-cover h-16 rounded-lg"
                                            src="{{ asset('posts/' . $row->post->image) }}"alt="">
                                    </div>
                                    <div class="items-center text-center basis-3/10 text-black ">
                                        <p>{{ $row->post->title }}</p>
                                        <p>{{ $row->post->price }}$</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endauth
            <div class="relative" x-data="{ open: false }" dir="ltr">
                <!-- Avatar button -->
                <button @click="open = !open" type="button"
                    class="relative z-10 w-10 h-10 rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <img src="https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png"
                        alt="User dropdown" class="w-full h-full rounded-full">
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false"
                    class="absolute z-20 mt-2 w-64 bg-white rounded-lg shadow-lg overflow-hidden">
                    @if (auth()->check())
                        <div class="px-4 py-4 text-gray-800">
                            <!-- Change text color as needed -->
                            <div class="font-sans font-bold text-sm py-1 capitalize">{{ auth()->user()->name }}</div>
                            <div class="font-sans font-bold text-gray-600 text-sm py-1 first-letter:capitalize">
                                {{ auth()->user()->email }}</div>
                            <!-- Change text color as needed -->
                        </div>
                        <hr>
                        <ul class="py-1">
                            <li><a href=""
                                    class="text-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">دەربارەی
                                    من</a></li>
                        </ul>
                        <hr>
                        {{-- <form action="{{ route('profile.index') }}" method="get" class="flex-grow pt-1">
                                    @csrf
                                    <button type="submit"
                                        class="text-center w-full px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">پڕۆفایل</button>
                                </form> --}}
                        <hr>
                        <ul class="py-1">
                            <li><a href="{{ route('profile.index') }}"
                                    class="text-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">پڕۆفایل
                                </a></li>
                        </ul>
                        <hr>
                        <form action="{{ route('logout') }}" method="post" class="flex-grow pt-1">
                            @csrf
                            <button type="submit"
                                class="text-center w-full px-4 py-3 text-sm text-gray-700 hover:bg-gray-100">چوونەدەرەوە</button>
                        </form>
                    @else
                        <div class="border-t border-gray-200 text-end">
                            <a href="{{ route('register') }}"
                                class="block px-6 py-4 text-sm text-gray-700 hover:bg-gray-100">دروستکردنی هەژمار</a>
                            <hr>
                            <a href="{{ route('login') }}"
                                class="block px-6 py-4 text-sm text-gray-700 hover:bg-gray-100">کردنەوەی هەژمار</a>
                        </div>
                    @endif
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var dropdown = document.querySelector("[x-data] [x-show]");
                    if (dropdown) {
                        dropdown.__x.$data.open = false;
                    }
                });
            </script>

        </div>
    </div>
    <div class="flex">
        <div class="basis-1/5">
            <div class="border-l-2">
                <div class="border-b-2 py-3">
                    <p class="px-5 p-2">فلتەر</p>
                </div>
                <div class="border-b-2 pb-4">
                    <p class="my-3 px-5 p-2">پۆلەکان</p>
                    <form action="" class="px-5 text-gray-500 text-sm space-y-4">

                        <div class="flex items-center">
                            <input type="checkbox" class="accent-green-500 text-white">
                            <span class="mr-2">پیاوان</span>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="accent-green-500 text-white">
                            <span class="mr-2">ئافرەتان</span>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="accent-green-500 text-white">
                            <span class="mr-2">منداڵان</span>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="accent-green-500 text-white">
                            <span class="mr-2">هاوینە</span>
                        </div>
                        <button class="w-full items-center">ئەوانی تر <i class="fa-solid fa-angle-down"></i></button>
                    </form>
                </div>
                <div class="border-b-2 pb-4">
                    <p class="my-2 px-5 p-2">مەودای نرخەکان</p>
                    <div class="w-8/12 mx-auto mt-2 flex flex-wrap justify-between">
                        <input type="text" placeholder="کەمترین"
                            class="w-4/12 px-1 py-1 text-sm text-center border border-gray-400 focus:outline-none rounded-lg focus:bg-gray-200">
                        <input type="text" placeholder="زۆرترین"
                            class="w-4/12 px-1 py-1 text-sm text-center border border-gray-400 focus:outline-none rounded-lg focus:bg-gray-200">
                        <button
                            class="mt-4 bg-green-600 text-white text-center px-4 py-1 rounded-xl w-full hover:bg-green-700">
                            نرخ دیاری بکە</button>
                    </div>
                </div>
                <div class="border-b-2">
                    <div class="bg-green-600 flex items-center justify-center px-3 py-4">
                        <div class="basis-11/12 text-center px-5 py-5 rounded bg-green-500">
                            <p class="text-center text-xl text-white pb-2"> داشکاندنی ٣٠٪</p>
                            <p class="text-center text-xs text-gray-100"> هاوڕێکانت بێبەش مەکە لەم ئۆفەرە هەر ئێستا
                                هاوبەشی پێبکە لە کرینی جلوبەرگ</p>
                            <button
                                class="bg-yellow-400 rounded-lg text-sm text-center w-8/12 mt-4 mb-1 mx-auto py-1 hover:bg-yellow-500">
                                هاوبەشیکردن</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="basis-10/12 p-4 overflow-y-scroll h-[672px] ">
            @yield('content')
        </div>
    </div>
</body>
<script>
    let showModalUser = (id) => {
        document.getElementById(id).classList.toggle('hidden')
    };
</script>

</html>

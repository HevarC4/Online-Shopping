@extends('layouts.public')
@section('content')
    <form action="{{ route('index') }}">
        <div class="bg-gray-400/30 flex items-center justify-between px-4 p-2 rounded-2xl w-6/12">
            <button class="focus:outline-none mt-1 text-gray-500">
                <i class="fas fa-search"></i>
            </button>
            <input type="text" value="{{ request('q') }}" name="q" id="search"
                onkeyup="checkTimes(event.target.value)" class="w-11/12 bg-transparent focus:outline-none">
            <button onclick="cleanSearch()" class="focus:outline-none mt-1 text-gray-500 hidden" id="times">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </form>
    @if (request('q'))
        <p class="mt-4 text-gray-400 text-sm "> ئەنجامی گەڕان بۆ " {{ request('q') }} "</p>
    @endif
    <div class="grid grid-cols-4 gap-10 mt-10 px-4">
        @if (count($posts) > 0)
        @foreach ($posts as $row)
            <div class="h-72 rounded-2xl overflow-hidden relative">
                <img src="{{ asset('posts/' . $row->image) }}" alt="" class="h-72 w-full object-cover">
                <div class="absolute h-full w-full  bg-gradient-to-t from-black/80 to-transparent top-0 left-0">
                    <button
                        class="w-9 h-9 bg-black/30 text-white rounded-xl flex items-center justify-center relative top-2 right-2">
                        <i class="fas fa-heart"></i>
                    </button>
                    <div class="absolute bottom-3 px-2 w-full space-y-5">
                        <p class="text-white text-xl">{{ $row->title }}</p>
                        <p
                            class="bg-green-800/80 text-center text-sm text-white rounded-lg p-1 pt-2 border-2 border-green-700">
                            {{ $row->price }} د.ع
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="col-span-4 flex justify-center items-center row-span-10 ">
            <div class="bg-gray-100 border border-gray-300 rounded-md p-5 text-gray-600 text-center">
                هیچ ئه‌نجامێك نه‌دۆزرایه‌وه‌.
            </div>
        </div>
        @endif
    </div>
@endsection

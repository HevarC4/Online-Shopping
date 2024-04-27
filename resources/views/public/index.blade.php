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
                <x-post-component :favId="$favId" :data="$row" />
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

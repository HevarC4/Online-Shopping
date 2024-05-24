@extends('layouts.app')
@section('content')
    <div class="pb-8">
        <a class="bg-green-600 px-6 py-2 rounded-xl text-white hover:bg-green-700 "
            href="{{ route('category.index') }}">گەڕانەوە</a>
    </div>
    <div class="w-11/12 h-full px-14 py-8 pb-14 shadow-lg rounded-lg bg-slate-100/50 my-8">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            @if (session()->has('msg'))
                <div dir="rtl" class="text-lg text-green-600 mt-2 text-center">{{ session()->get('msg') }}</div>
            @endif
            <div class=" grid grid-cols-1 gap-x-16 gap-y-8 mt-10">
                <div class="relative z-0 w-3/6 mb-5 group">
                    <input type="text" name="name" id="name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('name') }}" placeholder=" " />
                    <label for="name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        ناو
                    </label>
                    <div class="flex items-center justify-center">
                        @error('name')
                            <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-right mt-6">
                    <button type="submit"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center ">
                        زیادکردن
                    </button>
                </div>
        </form>

    </div>
@endsection

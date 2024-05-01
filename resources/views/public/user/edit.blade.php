@extends('layouts.public')
@section('content')
    <div dir="ltr" class="flex items-center justify-center pt-8 ml-20 " id="">
        <div class="w-5/12 border-2 p-7 rounded-3xl shadow-xl">
            <form dir="rtl" method="POST" action="{{ route('profile.update',['profile'=>auth()->id()]) }}">
                @csrf
                @method('PUT')

                <div class="flex items-center justify-center">
                    <div class="mb-6 h-16 w-16 rounded-full bg-green-600 text-white flex items-center justify-center">
                        <i class="text-3xl fa-solid fa-cog"></i>
                    </div>
                </div>

                <div class="flex flex-col space-y-6">
                    <input
                        class="p-2 bg-gray-50 border-2  border-green-300 focus:border-green-300 focus:outline-green-600 rounded-xl items-center justify-center"
                        type="text" placeholder="ناو" name="name" value="{{ auth()->user()->name }}" autocomplete="name"
                        autofocus>

                    @error('name')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror

                    <input
                        class="p-2 bg-gray-50 border-2  border-green-300 focus:border-green-300 focus:outline-green-600 rounded-xl items-center justify-center"
                        type="email" placeholder="ئیمەیڵ" name="email" value="{{ auth()->user()->email }}" autocomplete="email">

                    @error('email')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                    <input
                        class="p-2 bg-gray-50 border-2  border-green-300 focus:border-green-300 focus:outline-green-600 rounded-xl items-center justify-center"
                        id="password" type="password" placeholder="وشەی نهێنی" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="spam">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password_confirmation" type="password" placeholder="دووبارە کردنەوەی وشەی نهێنی"
                        class="p-2 bg-gray-50 border-2  border-green-300 focus:border-green-300 focus:outline-green-600 rounded-xl items-center justify-center"
                        name="password_confirmation" autocomplete="new-password_confirmation">

                    <input type="text" placeholder="ناونیشان"
                        class="p-2 bg-gray-50 border-2  border-green-300 focus:border-green-300 focus:outline-green-600 rounded-xl items-center justify-center"
                        name="address" value="{{ auth()->user()->address }}" autocomplete="address">

                    @error('address')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="flex items-center justify-center">
                    <button
                        class="bg-green-500 border-2 text-white border-green-600 text-lg px-12 pt-2 pb-1 mt-6 rounded-lg shadow-sm "
                        type="submit">
                        {{ __('تازەکردنەوە') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

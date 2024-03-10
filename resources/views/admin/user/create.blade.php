@extends('layouts.app')
@section('content')
    <div class="pb-8">
        <a class="bg-green-600 px-6 py-2 rounded-xl text-white hover:bg-green-700 "
            href="{{ route('user.index') }}">گەڕانەوە</a>
    </div>



    <div class="h-3/4 px-14 py-8 shadow-lg rounded-lg bg-slate-100/50">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class=" grid grid-cols-2 gap-x-16 gap-y-8 mt-10">
                <div class="relative z-0 w-auto mb-5 group">
                    <input type="text" name="name" id="name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('name') }}" placeholder=" " />
                    <label for="name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        ناو
                    </label>
                    <div class="flex items-center justify-center" dir="ltr">
                        @error('name')
                            <div dir="ltr" class="text-xs text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="relative z-0 w-auto mb-5 group">
                    <input type="email" name="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('email') }}" placeholder=" " />
                    <label for="email"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        ئیمەیڵ
                    </label>
                    <div class="flex items-center justify-center" dir="ltr">
                        @error('email')
                            <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="relative z-0 w-auto mb-5 group">
                    <input type="password" name="password" id="password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('password') }}" placeholder=" " />
                    <label for="password"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        وشەی تێپەڕ
                    </label>
                    <div class="flex items-center justify-center" dir="ltr">
                        @error('password')
                            <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="relative z-0 w-auto mb-5 group">
                    <input type="password" name="password_confermation" id="password_confermation"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('password_confermation') }}" placeholder=" " />
                    <label for="password_confermation"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        دووبارە کردنەوەی وشەی تێپەڕ
                    </label>
                    <div class="flex items-center justify-center" dir="ltr">
                        @error('password_confermation')
                            <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- pattern="[0-9]{4}[0-9]{3}[0-9]{4}" --}}
                <div class="relative z-0 w-auto mb-5 group">
                    <input type="text" name="phoneNumber" id="phoneNumber"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('phoneNumber') }}" placeholder="" />
                    <label for="phoneNumber"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-700 peer-focus:dark:text-green-700 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        ژمارەی تەلەفۆن (0000-000-0700)
                    </label>
                    <div class="flex items-center justify-center" dir="ltr">
                        @error('phoneNumber')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- pattern="[0-9]{4}[0-9]{3}[0-9]{4}" --}}
            </div>
            <div class="text-right mt-6">
                <button type="submit"
                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-600 dark:focus:ring-green-700">
                    زیادکردن
                </button>
            </div>
        </form>

    </div>
@endsection

@extends('layouts.app')
@section('content')

    <head>
        <script src="{{ asset('js/deleteAlert.js') }}"></script>
    </head>

    <body>
        <div class="pb-8">
            <a class="bg-green-600 px-6 py-2 rounded-xl text-white hover:bg-green-700 "
                href="{{ route('user.index') }}">گەڕانەوە</a>
        </div>
        <div class="w-11/12 h-full px-14 py-8 pb-14 shadow-lg rounded-lg bg-slate-100/50 my-8">
            <form action="{{ route('user.update', ['user' => $datas->id]) }}" method="POST">
                @csrf
                @method('PUT')
                @if (session()->has('msg'))
                    <div dir="rtl" class="text-lg text-green-600 mt-2 text-center">{{ session()->get('msg') }}</div>
                @endif
                <div class=" grid grid-cols-2 gap-x-16 gap-y-8 mt-10">
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="name" id="name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            value="{{ $datas->name }}" placeholder=" " />
                        <label for="name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            ناو
                        </label>
                        <div class="flex items-center justify-center">
                            @error('name')
                                <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="relative z-0 w-auto mb-5 group font-sans font-bold">
                        <input type="email" name="email" id="email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            value="{{ $datas->email }}" placeholder=" " />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            ئیمەیڵ
                        </label>
                        <div class="flex items-center justify-center">
                            @error('email')
                                <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="password" name="password" id="password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            placeholder=" " />
                        <label for="password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            وشەی تێپەڕ
                        </label>
                        <div class="flex items-center justify-center">
                            @error('password')
                                <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            placeholder=" " />
                        <label for="password_confirmation"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            دووبارە کردنەوەی وشەی تێپەڕ
                        </label>
                        <div class="flex items-center justify-center">
                            @error('password_confirmation')
                                <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- pattern="[0-9]{4}[0-9]{3}[0-9]{4}" --}}
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="phoneNumber" id="phoneNumber"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            value="{{ $datas->phoneNumber }}" placeholder="" />
                        <label for="phoneNumber"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-700  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            ژمارەی تەلەفۆن (0000-000-0700)
                        </label>
                        <div class="flex items-center justify-center">
                            @error('phoneNumber')
                                <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- pattern="[0-9]{4}[0-9]{3}[0-9]{4}" --}}
                    <div class="relative z-0 w-auto mb-5 group">
                        <input type="text" name="address" id="address"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            value="{{ $datas->address }}" placeholder=" " />
                        <label for="address"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            ناونیشان
                        </label>
                        <div class="flex items-center justify-center">
                            @error('address')
                                <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="relative z-0 w-auto mb-5 group">
                        <select name="role" id="role"
                            class="block text-center py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-green-600 peer">
                            <option value="0" {{ $datas->role == 0 ? 'selected' : '' }}>User</option>
                            <option value="1" {{ $datas->role == 1 ? 'selected' : '' }}>Admin</option>
                        </select>
                        <label for="role"
                            class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700    peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Role
                        </label>
                        <div class="flex items-center justify-center">
                            @error('role')
                                <div class="text-xs text-red-600 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="text-right mt-6">
                    <button type="submit"
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center ">
                        تازەکردنەوە
                    </button>
                </div>
            </form>
            <form id="deleteForm" action="{{ route('user.destroy', ['user' => $datas->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="text-right mt-4">
                    <button
                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center
                        "
                        onclick="deleteData()" type="button">
                        {{-- <span><i class="fas fa-trash"></i></span> --}}
                        سڕینەوە
                    </button>
                </div>
            </form>
        </div>
    </body>
@endsection

@extends('layouts.app')
@section('content')
    <div class="pb-4">
        <a class="bg-green-600 px-6 py-2 rounded-xl text-white hover:bg-green-700 "
            href="{{ route('post.index') }}">گەڕانەوە</a>
    </div>
    <div class="w-11/12 h-full px-14 py-1 pb-14 shadow-lg rounded-lg bg-slate-100/50 my-8">
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (session()->has('msg'))
                <div dir="rtl" class="text-lg text-green-600 mt-2 text-center">{{ session()->get('msg') }}</div>
            @endif
            <div class=" grid grid-cols-2 gap-x-16 gap-y-8 mt-10">
                <div class="relative z-0 w-auto mb-5 group">
                    <input type="text" name="title" id="title"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('title') }}" placeholder=" " />
                    <label for="title"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        تایتڵ
                    </label>
                    <div class="flex items-center justify-center">
                        @error('title')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="relative z-0 w-auto mb-5 group">
                    <input type="number" name="price" id="price"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('price') }}" placeholder=" " />
                    <label for="price"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        نرخ
                    </label>
                    <div class="flex items-center justify-center">
                        @error('price')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="relative z-0 w-auto mb-5 group">
                    <input type="text" name="description" id="description"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('description') }}" placeholder=" " />
                    <label for="description"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        درێزە
                    </label>
                    <div class="flex items-center justify-center">
                        @error('description')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="relative z-0 w-auto mb-5 group">
                    <input type="text" name="color" id="color"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('color') }}" placeholder=" " />
                    <label for="color"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        ڕەنگ
                    </label>
                    <div class="flex items-center justify-center">
                        @error('color')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="relative z-0 w-auto mb-5 group">
                    <input type="text" name="size" id="size"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        value="{{ old('size') }}" placeholder=" " />
                    <label for="size"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-green-700 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        سایز
                    </label>
                    <div class="flex items-center justify-center">
                        @error('size')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="relative">
                    <input type="file" name="image" id="image" class="hidden" />
                    <label for="image" class="flex w-3/5 items-center justify-center cursor-pointer bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mt-2px ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        وێنە
                    </label>
                    <span id="file-name" dir="ltr" class="ml-2 font-sans font-bold "></span> <!-- Display selected file name -->
                    <div class="flex items-center justify-center">
                        @error('image')
                            <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="relative z-0 w-auto mb-5 group">
                    <select multiple  name="category[]" id="category_id"
                            class="text-center block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-gray-700 dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer">
                        @foreach ($category as $row)
                            <option value="{{ $row->id }}">
                                {{ $row->name }}
                            </option>
                        @endforeach
                    </select>
                    <label for="category_id"
                           class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        بەشەکان
                    </label>
                    @error('category_id')
                        <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="text-right mt-6">
                <button type="submit"
                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-600 dark:focus:ring-green-700">
                    زیادکردن
                </button>
            </div>
        </form>
        <script>
            // Get the file input element
            const fileInput = document.getElementById('image');

            // Add event listener for file input change
            fileInput.addEventListener('change', function() {
                // Get the selected file name
                const fileName = this.files[0].name;

                // Display the file name in the span element
                const fileNameSpan = document.getElementById('file-name');
                fileNameSpan.textContent = fileName;
            });
        </script>
    </div>
@endsection

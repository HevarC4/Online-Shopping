@extends('layouts.public')
@section('content')

    <head>
        <script src="{{ asset('js/deleteAlert.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css') }}">
        <script src="{{ asset('js/DataTable.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    </head>
    <div class="flex items-center justify-between font-sans font-bold  border-b-2 pb-4">
        <div>
            <a href="{{ route('profile.edit', Auth::id()) }}"><i class="p-4 fas fa-cog text-xl"></i> </a>
        </div>
        <div class="text-left space-y-4 ml-8">
            <div class="flex items-center justify-center">
                <div class="flex-cols mx-8">
                    <p>{{ auth()->user()->name }}</p>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <img src="https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png"
                    alt="User dropdown" class="w-20  rounded-full">
            </div>
        </div>
    </div>
    <div class="mb-6">
        <h1 class="text-2xl font-bold mb-4 text-center pt-4">مامەڵەکانت</h1>
        <div class="bg-white p-4 rounded shadow-md flex justify-center">
            <div class="ml-28">
                <h2 class="text-xl font-semibold mb-2 mr-8">کۆی نرخی بەرهەمەکان:</h2>
                <p class="text-2xl text-green-500 font-bold mr-8 text-center">
                    د.ع {{ number_format($totalPrice, 2) }}
                </p>
            </div>
            <div class="mr-28">
                <h2 class="text-xl font-semibold mb-2 mr-8">کۆی گشتی بەرهەمەکانی داواکراو:</h2>
                <p class="text-2xl text-green-500 font-bold mr-8 text-center">
                    {{ $totalCount }}

                </p>
            </div>
        </div>
    </div>
    <div id="app" dir="ltr" class="px-6 py-4 shadow-lg rounded-lg bg-slate-100/50->post">
        <div class="card has-table">
            <div class="card-content">
                <div class="overflow-x-auto">
                    <table id="example" class="table-auto border font-bold">
                        <thead class="bg-green-700 text-gray-200">
                            <tr class="text-[0.7rem]">
                                <th>تایتڵ</th>
                                <th>نرخ</th>
                                <th>ڕەنگ</th>
                                <td>سایز</td>
                                <th>وێنە</th>
                                <th>کاتی دروستبوون</th>
                                <th>کردارەکان</th>
                            </tr>
                        </thead>
                        <tbody class="font-sans font-bold text-gray-600">
                            @foreach ($posts as $data)
                                <tr class="text-[0.8rem]">
                                    <td>{{ $data->post->title }}</td>
                                    <td>{{ ($data->post->discount > 0)? $data->post->price * $data->post->discount : $data->post->price  }}</td>
                                    <td>{{ $data->post->color }}</td>
                                    <td>{{ $data->post->size }}</td>
                                    <td>
                                        <img class="w-24" src="{{ asset('posts/' . $data->post->image . '') }}"
                                            alt="">
                                    </td>
                                    <td class="w-40">{{ $data->created_at->diffForHumans() }}</td>
                                    <!-- ... (previous code) ... -->
                                    <td class="text-center w-40">
                                        @if ($data->state == 0)
                                            <form action="{{ route('delete', ['id' => $data->id]) }}" id="deleteForm"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="deleteData()" type="button"
                                                    class="py-2 p-3 text-[16px] text-red-500 place-items-center">
                                                    <span>
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

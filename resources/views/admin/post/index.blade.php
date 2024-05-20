@extends('layouts.app')
@section('content')
    <div class="pb-4">
        <a class="bg-green-600 px-6 py-2 rounded-xl text-white hover:bg-green-700 "
            href="{{ route('post.create') }}">زیادکردن</a>
    </div>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css') }}">
        <script src="{{ asset('js/DataTable.js') }}"></script>
        <script src="{{ asset('js/deleteAlert.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    </head>

    <body class="">
        <div id="app" dir="ltr" class="px-6 py-4 shadow-lg rounded-lg bg-slate-100/50">
            <div class="card has-table">
                <div class="card-content">
                    <div class="overflow-x-auto">
                        <table id="example" class="table-auto border font-bold">
                            <thead class="bg-green-700 text-gray-200">
                                <tr class="text-[0.7rem]">
                                    <th>ID</th>
                                    <th>تایتڵ</th>
                                    <th>درێزە</th>
                                    <th>نرخ</th>
                                    <th>ڕەنگ</th>
                                    <td>سایز</td>
                                    <td>داشکاندن</td>
                                    <th>ژمارەی بەشاکان</th>
                                    <th>وێنە</th>
                                    <th>کاتی دروستبوون</th>
                                    <th>کردارەکان</th>
                                </tr>
                            </thead>
                            <tbody class="font-sans font-bold text-gray-600">
                                @foreach ($datas as $data)
                                    <tr class="text-[0.8rem]">
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>{{ $data->price }}</td>
                                        <td>{{ $data->color }}</td>
                                        <td>{{ $data->size }}</td>
                                        <td>%{{ $data->discount }}</td>
                                        <td class=" w-28 text-center">{{ $data->categories_count }}</td>
                                        <td>
                                            <img class="w-24" src="{{ asset('posts/' . $data->image . '') }}"
                                                alt="">
                                        </td>
                                        <td class="w-40">{{ $data->created_at->diffForHumans() }}</td>
                                        <!-- ... (previous code) ... -->
                                        <td class="text-center w-40">
                                            <!-- Edit button -->
                                            <a class="" href="{{ route('post.edit', ['post' => $data->id]) }}">
                                                <button class="py-2 p-3 text-[16px] text-blue-500 place-items-center"
                                                    type="submit">
                                                    <span>
                                                        <i class="fas fa-pen"></i>
                                                    </span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

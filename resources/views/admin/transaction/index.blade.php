@extends('layouts.app')
@section('content')

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
                                    <th>بەکارهێنەر</th>
                                    <th>ژمارەی مۆبایل</th>
                                    <th>ناونیشان</th>
                                    <th>ستەیت</th>
                                    <th>کاڵاکان</th>
                                    <th>کاتی دروستبوون</th>
                                    <th>کردارەکان</th>
                                </tr>
                            </thead>
                            <tbody class="font-sans font-bold text-gray-600">
                                @foreach ($transactions as $data)
                                    <tr class="text-[0.8rem]">
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->user->phoneNumber }}</td>
                                        <td>{{ $data->user->address }}</td>
                                        <td>
                                            <form action="{{ route('transaction.update',['transaction' =>$data->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="{{ $data->state == 1 ? ' text-green-500' : 'text-red-500'}}">Change</button>
                                            </form>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('post.edit', ['post' => $data->post_id]) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>

                                        <td class="w-40">{{ $data->created_at->diffForHumans() }}</td>

                                        {{-- <td class=" w-28 text-center">{{ $data->categories_count }}</td>  --}}
                                        <td class="text-center w-40">
                                            <form action="{{ route('transaction.destroy',['transaction' =>$data->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button><i class="fas fa-trash text-red-500"></i></button>
                                            </form>
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

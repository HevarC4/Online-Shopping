@extends('layouts.app')
@section('content')
    <div class="pb-4">
        <a class="bg-green-600 px-6 py-2 rounded-xl text-white hover:bg-green-700 "
            href="{{ route('user.create') }}">زیادکردن</a>
    </div>


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css') }}">
        <script src="{{ asset('js/DataTable.js') }}"></script>
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
                                    <th>ناو</th>
                                    <th>ئیمەیڵ</th>
                                    <th>ژمارەی تەلەفۆن</th>
                                    <th>ناونیشان</th>
                                    <th>کردارەکان</th>
                                </tr>
                            </thead>
                            <tbody class="font-sans font-bold text-gray-600">
                                @foreach ($datas as $data)
                                    <tr class="text-[0.7rem]">
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phoneNumber }}</td>
                                        <td>{{ $data->address }}</td>

                                        <!-- ... (previous code) ... -->
                                        {{-- flex items-center justify-center space-y-4 --}}
                                        <td class="grid grid-cols-2 ">
                                            <!-- Edit button -->
                                            <a class="items-center" href="{{ route('user.edit', ['user' => $data->id]) }}">
                                                <button class="py-2 px-6 text-[15px] text-blue-500" type="submit">
                                                    <span>
                                                        <i class="fas fa-pen items-center"></i>
                                                    </span>
                                                </button>
                                            </a>
                                            <!-- Delete button -->
                                            <form action="{{ route('user.destroy',['user'=>$data->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="py-2 px-6 text-[15px] text-red-500"  type="submit">
                                                    <span><i class="fas fa-trash items-center"></i></span>
                                                </button>
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

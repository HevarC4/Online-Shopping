@extends('layouts.app')
@section('content')
    <div class="px-6 py-4 shadow-lg rounded-lg bg-slate-100/50">
        <div class="grid grid-cols-2 gap-5 text-white rtl:space-x-reverse">
            <div class="bg-green-500 rounded-lg flex items-center justify-center text-2xl p-2 h-40">
                <i class="fas fa-users text-4xl text-gray-800"></i>
                <p class="pr-8">{{ $user }}</p>
            </div>
            <div class="bg-green-500 rounded-lg flex items-center justify-center text-2xl p-2 h-40">
                <i class="fas fa-boxes text-4xl text-gray-800"></i>
                <p class="pr-8">{{ $category }}</p>
            </div>
            <div class="bg-green-500 rounded-lg flex items-center justify-center text-2xl p-2 h-40">
                <i class="fas fa-image text-4xl text-gray-800"></i>
                <p class="pr-8">{{ $post }}</p>
            </div>
            <div class="bg-green-500 rounded-lg flex items-center justify-center text-2xl p-2 h-40">
                <i class="fas fa-dollar-sign text-4xl text-gray-800"></i>
                <p class="pr-8">{{ $transaction }}</p>
            </div>
        </div>
    </div>
@endsection

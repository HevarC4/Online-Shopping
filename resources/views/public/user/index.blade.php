@extends('layouts.public')
@section('content')
    <div class="flex items-center justify-between font-sans font-bold">
        <div>
            <a href="{{ route('profile.edit',Auth::id()) }}"><i class="p-4 fas fa-cog text-xl"></i> </a>
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
@endsection

@extends('layouts.public')

@section('content')
    <div class="flex items-center justify-between">

        <div>
            <a href="{{ route('profile.edit', Auth::id()) }}"><i class="fas fa-cog text-xl" ></i></a>
        </div>
        <div class="text-left">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <div>
                    <p>{{ auth()->user()->name }}</p>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <img src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg" class="w-20 rounded-full " alt="">
            </div>

        </div>

    </div>
@endsection

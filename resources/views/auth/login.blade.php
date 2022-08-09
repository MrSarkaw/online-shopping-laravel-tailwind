@extends('layouts.public')

@section('content')
<div class="container">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="w-6/12 mx-auto mt-10 shadow bg-white p-6 space-y-4 rounded-lg">
            <i class="fa-solid fa-shirt h-16  w-16 text-3xl mx-auto rounded-full bg-green-600 text-white flex items-center justify-center"></i>

            <div class="bg-gray-300 p-2 rounded-xl px-3">
                <p class="text-xs text-gray-600">ئیمەل</p>
                <input value="{{ old('email') }}" type="text" placeholder="example@gmail.com" name="email" class="bg-transparent focus:outline-none w-full">
                @error('email')
                    <span class="text-red-500 text-xs mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="bg-gray-300 p-2 rounded-xl px-3">
                <p class="text-xs text-gray-600">وشەی نهێنی</p>
                <input type="password" placeholder="*******" name="password" class="bg-transparent focus:outline-none w-full">
                @error('password')
                    <span class="text-red-500 text-xs mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="mt-2 rounded-full bg-green-600 text-white px-4 py-1">چوونەژوورەوە</button>
            <div class="mt-2 text-green-600 text-left">
                <a class="border-b-2 border-green-600 pb-2" href="{{ route('register') }}">تۆماربوون</a>
            </div>
        </div>
    </form>

</div>
@endsection

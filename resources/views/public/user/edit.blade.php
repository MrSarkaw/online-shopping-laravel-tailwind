@extends('layouts.public')

@section('content')
<div class="container">
    <form action="{{ route('profile.update', ['profile' => auth()->id()]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-6/12 mx-auto  shadow bg-white p-6 space-y-4 rounded-lg">
            <i class="fa-solid fa-cog h-16  w-16 text-3xl mx-auto rounded-full bg-green-600 text-white flex items-center justify-center"></i>

            <div class="bg-gray-300 p-2 rounded-xl px-3">
                <p class="text-xs text-gray-600">ناو</p>
                <input value="{{ auth()->user()->name }}"  type="text" placeholder="" name="name" class="bg-transparent focus:outline-none w-full">
                @error('name')
                    <span class="text-red-500 text-xs mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="bg-gray-300 p-2 rounded-xl px-3">
                <p class="text-xs text-gray-600">ئیمەل</p>
                <input value="{{ auth()->user()->email }}"  type="text" placeholder="example@gmail.com" name="email" class="bg-transparent focus:outline-none w-full">
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

            <div class="bg-gray-300 p-2 rounded-xl px-3">
                <p class="text-xs text-gray-600">دووبارەکردنەوی وشەی نهێنی</p>
                <input type="password" placeholder="*******" name="password_confirmation" class="bg-transparent focus:outline-none w-full">
            </div>

            <div class="bg-gray-300 p-2 rounded-xl px-3">
                <p class="text-xs text-gray-600">ناونیشان</p>
                <input value="{{ auth()->user()->address }}"  type="text" placeholder="" name="address" class="bg-transparent focus:outline-none w-full">
                @error('address')
                    <span class="text-red-500 text-xs mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="mt-2 rounded-full bg-green-600 text-white px-4 py-1">تازەکردنەوە</button>

        </div>
    </form>

</div>
@endsection

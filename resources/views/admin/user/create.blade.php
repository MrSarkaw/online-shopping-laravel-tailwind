@extends('layouts.app')
@section('content')
    <a class="bg-green-500 px-6 py-2 rounded-xl text-white" href="{{route("user.index")}}">گەڕاندنەوە</a>
    <div class="h-96 flex items-center justify-center">
        <form action="{{route('user.store')}}" class="basis-11/12" method="post">
            @if (session()->has('msg'))
                <p class=" text-green-500 mt-2 text-xl text-center">
                    {{session()->get('msg')}}
                </p>
            @endif
            @csrf
            <div class="grid grid-cols-3 gap-4 gap-y-10 mt-3">
                <div>
                    <p>ناو</p>
                    <input value="{{old('name')}}" name="name" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                    @error('name')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div>
                    <p>ئیمەل</p>
                    <input name="email" value="{{old('email')}}" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                    @error('email')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div>
                    <p>وشەی تێپەڕ</p>
                    <input name="password"  type="password" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                    @error('password')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div>
                    <p>دووبارە کردنەوەی وشەی تێپەڕ</p>
                    <input name="password_confirmation" type="password" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                </div>

                <div>
                    <p>ژمارە مۆبایل</p>
                    <input name="phone_number" value="{{old('phone_number')}}" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" >
                    @error('phone_number')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>
            </div>

            <button class="mt-8 bg-green-500 text-white w-2/12 pt-1 rounded-xl">add</button>
        </form>
    </div>
@endsection

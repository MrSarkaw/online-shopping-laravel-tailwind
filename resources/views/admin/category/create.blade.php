@extends('layouts.app')
@section('content')
    <a class="bg-green-500 px-6 py-2 rounded-xl text-white" href="{{route("category.index")}}">گەڕاندنەوە</a>
    <div class="h-96 flex items-center justify-center">
        <form action="{{route('category.store')}}" class="basis-11/12" method="post">
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

            </div>

            <button class="mt-8 bg-green-500 text-white w-2/12 pt-1 rounded-xl">زیاکردن</button>
        </form>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <a class="bg-green-500 px-6 py-2 rounded-xl text-white" href="{{route("post.index")}}">گەڕاندنەوە</a>
    <div class="h-96 flex items-center justify-center">
        <form action="{{route('post.store')}}" class="basis-11/12" method="post" enctype="multipart/form-data">
            @if (session()->has('msg'))
                <p class=" text-green-500 mt-2 text-xl text-center">
                    {{session()->get('msg')}}
                </p>
            @endif
            @csrf
            <div class="grid grid-cols-3 gap-4 gap-y-10 mt-3">

                <div>
                    <p>تایتڵ</p>
                    <input value="{{old('title')}}" name="title" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                    @error('title')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div>
                    <p>درێژە</p>
                    <input value="{{old('descritpion')}}" name="descritpion" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                    @error('descritpion')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div>
                    <p>نرخ</p>
                    <input value="{{old('price')}}" name="price" type="number" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                    @error('price')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div>
                    <p>ڕەنگ</p>
                    <input value="{{old('color')}}" name="color" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                    @error('color')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div>
                    <p>سایز</p>
                    <input value="{{old('size')}}" name="size" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                    @error('size')
                        <p class="text-sm text-red-500 mt-2">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div>
                    <p>وێنە</p>
                    <input name="file" type="file" class="bg-gray-300 px-3 py-1 w-10/12 focus:outline-none rounded" placeholder="">
                    @error('file')
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

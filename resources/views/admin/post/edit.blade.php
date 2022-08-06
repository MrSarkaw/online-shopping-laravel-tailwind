@extends('layouts.app')
@section('content')
    <a class="bg-green-500 px-6 py-2 rounded-xl text-white" href="{{route("post.index")}}">گەڕاندنەوە</a>
    <div class="h-96 flex items-center justify-center">
        <div  class="basis-11/12" >
                <form action="{{route('post.update',['post'=>$data->id])}}" method="post" enctype="multipart/form-data">
                    @if (session()->has('msg'))
                        <p class=" text-green-500 mt-2 text-xl text-center">
                            {{session()->get('msg')}}
                        </p>
                    @endif
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-3 gap-4 gap-y-10 mt-3">

                        <div>
                            <p>تایتڵ</p>
                            <input value="{{$data->title}}" name="title" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                            @error('title')
                                <p class="text-sm text-red-500 mt-2">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <p>درێژە</p>
                            <input value="{{$data->descritpion}}"  name="descritpion" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                            @error('descritpion')
                                <p class="text-sm text-red-500 mt-2">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <p>نرخ</p>
                            <input value="{{$data->price}}"  name="price" type="number" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                            @error('price')
                                <p class="text-sm text-red-500 mt-2">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <p>ڕەنگ</p>
                            <input value="{{$data->color}}"  name="color" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
                            @error('color')
                                <p class="text-sm text-red-500 mt-2">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <div>
                            <p>سایز</p>
                            <input value="{{$data->size}}" name="size" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="">
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

                    <button class="mt-8 bg-green-500 text-white w-2/12 pt-1 rounded-xl">تازەکردنەوە</button>
                </form>

                <form id="deleteForm" method="POST" action="{{route('post.destroy',['post'=>$data->id])}}">
                    @csrf
                    @method('DELETE')

                    <button type="button"  onclick="deleteData()" class="mt-8 bg-red-500 text-white w-2/12 pt-1 rounded-xl">سڕینەوە</button>

                </form>

        </div>
    </div>

    <script>
        let deleteData = ()=>{
            Swal.fire({
                title: 'دڵنیای لە سڕینەوەی',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بەڵی',
                cancelButtonText: 'نەخێر'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'سڕایەوە!',
                    'دەیتاکە بەسەرکەوتووی سڕایەوە',
                    'success'
                    )

                    document.getElementById('deleteForm').submit();
                }
                })

        }
    </script>
@endsection

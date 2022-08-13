@extends('layouts.public')

@section('content')
@if(session()->get('msg'))
    <p class="text-green-500 text-center my-4 text-xl">{{ session()->get('msg') }}</p>
@endif
<div class="flex flex-wrap">
    <img class="w-3/12 rounded-lg object-cover" src="{{ asset('posts/'.$data->image) }}" alt="">
    <div class="w-9/12 px-10">
        <div class="grid grid-cols-4 gap-5">
            <p class="bg-green-500 text-center text-white pt-1 rounded-full px-2"> تایتڵ: {{$data->title}}</p>
            <p class="bg-green-500 text-center text-white pt-1 rounded-full px-2"> نرخ:  {{$data->price - ($data->price * $data->discount)}}</p>
            <p class="bg-green-500 text-center text-white pt-1 rounded-full px-2"> سایز: {{$data->size}}</p>
            <p class="bg-green-500 text-center text-white pt-1 rounded-full px-2"> ڕەنگ: {{$data->color}}</p>
        </div>
        <div class="my-2 shadow p-4 rounded-xl">
            {{$data->descritpion}}
        </div>
        <div class="mt-10">
            @foreach ($data->categories as $row)
                <span class="text-sm text-gray-600 mx-2">#{{$row->category->name}}</span>
            @endforeach
        </div>

        @auth
            <div class="flex text-sm mt-10 items-center justify-between">
                <form action="{{route('buy', ['id' => $data->id])}}" method="POST" id="buyForm">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $data->id }}">
                    <button onclick="buy()" type="button" class="bg-green-600 text-white px-4 rounded  py-1 ">کڕین</button>
                </form>
                <form action="{{ route('addToFavCart', ['id'=>$data->id, 'cart'=>1]) }}" method="post">
                    @csrf
                    @if ($check)
                    <button class="bg-red-600 text-white px-4 rounded  py-1 "> لابردن لە عەرەبانە</button>
                    @else
                    <button class="bg-blue-600 text-white px-4 rounded  py-1 ">زیاد کردن بۆ عەرەبانە</button>
                    @endif
                </form>
            </div>
        @endauth
    </div>
</div>

<div class="mt-10 shadow p-2 rounded">
    <div class="flex items-center justify-between">
        <p>لێدوانەکان</p>
        @auth
            <div>
                <form action="{{ route('profile.store') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$data->id}}" name="post_id">
                    <button class="bg-green-600 text-white text-sm px-3 py-1 pt-2 rounded">ناردن</button>
                    <input name="comment" type="text" class="bg-transparent outline-none border-b-2" name="" id="">
                </form>
            </div>
        @endauth
    </div>
    <div class="grid grid-cols-3 gap-10 mt-5">
        @foreach ($data->comments as $row)
            <div class="shadow p-2 rounded-lg">
                <div class="flex items-center justify-between">
                    <p class="text-xs text-gray-600">{{$row->created_at->diffForHumans()}}</p>
                    <p>{{$row->user->name}}</p>
                </div>
                <p class="mt-2 text-gray-600 text-sm">{{$row->comment}}</p>
            </div>
        @endforeach
    </div>
</div>

<script>
    let buy = ()=>{
        Swal.fire({
            title: 'ئایا دڵنیای لە کڕینی؟',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بەڵێ',
            cancelButtonText: 'نەخێر'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('buyForm').submit()
                Swal.fire(
                'بەسەرکەوتووی کڕدرا!',
                '',
                'success'
                )
            }
        })
    }
</script>
@endsection


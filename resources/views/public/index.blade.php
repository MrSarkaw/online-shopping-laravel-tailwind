@extends('layouts.public')

@section('content')
<form action="{{ route('index') }}">
    <div class="bg-gray-400/30 flex items-center justify-between p-2 px-4 rounded-2xl w-6/12">
        <button class="focus:outline-none mt-1 text-gray-400">
            <i class="fas fa-search"></i>
        </button>
        <input id="search" value="{{ request('q') }}" onkeyup="checkTimes(event.target.value)" name="q" type="text" class="w-11/12 bg-transparent focus:outline-none">
        <button onclick="cleanSearch()" class="focus:outline-none mt-1 text-gray-400 hidden" id="times">
            <i class="fas fa-times"></i>
        </button>
    </div>
</form>
@if (request('q'))
<p class="mt-4 text-gray-400 text-sm">ئەنجامی گەڕان بۆ "{{request('q')}}"</p>
@endif

<div class="grid grid-cols-4 gap-10 mt-10">

    @foreach ($posts as $row)
        <div class="h-72 rounded-2xl overflow-hidden relative">
            <img src="{{asset('posts/'.$row->image)}}" class="h-72 object-cover w-full" alt="">
            <div class="absolute h-full w-full bg-gradient-to-t from-black/80 to-transparent top-0 left-0">
                <button class="w-9 h-9 bg-black/30 text-white  rounded-xl pt-1 relative top-2 right-2">
                    <i class="fas fa-heart"></i>
                </button>

                <div class="absolute bottom-3 px-2 w-full space-y-5">
                    <p class="text-white text-xl">{{ $row->title }}</p>
                    <p class="bg-green-800/80 text-center text-white text-sm rounded-lg p-1 border-2 border-green-700 ">
                        {{$row->price}} د.ع
                    </p>
                </div>
            </div>
        </div>
    @endforeach


</div>

<script>
    let times = document.getElementById('times');

    let checkTimes=(value)=>{
        if(value != ''){
            times.classList.remove('hidden')
        }else{
            times.classList.add('hidden')
        }
    };

    let cleanSearch = ()=>{
        times.classList.add('hidden')
        document.getElementById('search').value= ''
    }
</script>
@endsection


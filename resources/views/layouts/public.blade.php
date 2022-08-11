<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body{
            font-family: "speda";
        }
        @font-face {
            font-family: 'speda';
            src: url('./Speda-Bold.ttf');
        }

        *::-webkit-scrollbar{
            width:6px;
        }

        *::-webkit-scrollbar-thumb{
            width:6px;
            background: rgb(75, 150, 75);
        }
    </style>
</head>
<body dir="rtl" class="bg-gray-100/50 ">
    <div class="flex justify-between items-center px-3 border-b-2">
        <div class="basis-7/12 flex justify-between">
            <a href="{{ route('index') }}" class="flex items-center space-x-2 rtl:space-x-reverse">
                <i class="fa-solid fa-shirt h-10 w-10 rounded-full bg-green-600 text-white flex items-center justify-center"></i>
                <p class="font-bold">جلوبەرگ</p>
            </a>
            <div class="space-x-5 rtl:space-x-reverse text-gray-500/70 flex items-center">
                <a href="" class="text-gray-700 border-b-2 border-green-600 py-4">فرۆشگا</a>
                <a href="">داواکردن</a>
                <a href="">شوێن</a>
                <a href="">بلۆگ</a>
                <a href="">یارمەتی</a>
            </div>
        </div>
        <div class="basis-3/12 text-left text-xl space-x-5 rtl:space-x-reverse justify-end items-center flex text-gray-500">

            @auth
            <div class="relative">
                <i onclick="showModalUser('cardModal')" class="fas fa-cart-shopping cursor-pointer"></i>
                @if(count($dtCard) > 0)
                <p class="w-3 h-3 bg-red-500 text-white text-xs text-center rounded-full absolute -top-1">
                    {{count($dtCard)}}
                </p>

                <div id="cardModal" class="absolute top-10 max-h-48 overflow-y-scroll hidden space-y-3 -left-28 w-60 bg-white p-2 rounded-xl z-50">
                    @foreach ($dtCard as $row)
                        <a href="{{ route('showpost', ['id'=>$row->post->id]) }}"  class="flex shadow rounded-lg pt-1 items-center justify-between text-xs px-2">
                            <div class="text-center basis-3/12">
                                <p>{{$row->post->title}}</p>
                                <p>{{$row->post->price}}$</p>
                            </div>
                             <div>
                                <img class="w-16 h-16 object-cover rounded-lg" src="{{ asset('posts/'.$row->post->image) }}" alt="">
                            </div>
                        </a>
                    @endforeach
                </div>
                @endif
            </div>


            <div class="relative">
                <i onclick="showModalUser('favModal')" class="fas fa-heart cursor-pointer"></i>
                @if(count($dtFav) > 0)
                <p class="w-3 h-3 bg-red-500 text-white text-xs text-center rounded-full absolute -top-1">
                    {{count($dtFav)}}
                </p>

                <div id="favModal" class="absolute top-10 max-h-48 overflow-y-scroll hidden space-y-3 -left-28 w-60 bg-white p-2 rounded-xl z-50">
                    @foreach ($dtFav as $row)
                        <a href="{{ route('showpost', ['id'=>$row->post->id]) }}"  class="flex shadow rounded-lg pt-1 items-center justify-between text-xs px-2">
                            <div class="text-center basis-3/12">
                                <p>{{$row->post->title}}</p>
                                <p>{{$row->post->price}}$</p>
                            </div>
                             <div>
                                <img class="w-16 h-16 object-cover rounded-lg" src="{{ asset('posts/'.$row->post->image) }}" alt="">
                            </div>
                        </a>
                    @endforeach
                </div>
                @endif
            </div>

            <div onclick="showModalUser('showModalUser')" class="flex items-center cursor-pointer relative">
                <p class="text-sm mt-2">{{ auth()->user()->name }}</p>
                <img src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg" class="w-12 rounded-full" alt="">

                <div id="showModalUser" class="shadow bg-green-600 text-white hidden text-sm text-center p-2 rounded-xl w-full top-14 absolute">
                    <form action="{{ route('logout') }}" method="POST" class="mb-2">
                        @csrf
                        <button>چوونەدەرەوە</button>
                    </form>
                    <a href="{{ route('profile.index') }}">پڕۆفایل</a>
                </div>
            </div>
            @endauth

            @guest
                <a href="{{ route('login') }}">
                    <img src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg" class="w-12 rounded-full" alt="">
                </a>
            @endguest
        </div>
    </div>
    <div class="flex ">
        <div class="basis-3/12  border-l-2 relative">
            <div class="border-b">
                <p class="my-1  p-2 px-5">فلتەر</p>
            </div>
            <div class="border-b">
                <p class="my-1 p-2 px-5">پۆلەکان</p>
                <form id="form" action="{{ route('index') }}" class="px-5 text-gray-500 mb-2 text-sm space-y-4">
                    @foreach ($category as $row)
                        <p>
                            @if(request('category'))
                            <input onchange="submitForm()" {{in_array($row->id, request('category'))?'checked':''}} type="checkbox" name="category[]" value="{{ $row->id }}" class="accent-green-500 text-white">
                            @else
                            <input onchange="submitForm()" type="checkbox" name="category[]" value="{{ $row->id }}" class="accent-green-500 text-white">
                            @endif
                            <span>{{$row->name}}</span>
                        </p>
                    @endforeach
                </form>
            </div>
            <div class="border-b pb-2">
                <form action="{{route('index')}}">
                    <p class="my-2 p-2 px-5">مەودای نرخەکان</p>
                    <div class="w-8/12 mx-auto mt-2 flex flex-wrap justify-between">
                        <input name="min" type="text" class="w-4/12 px-2 py-1 text-xs text-center border border-gray-300 rounded-lg focus:outline-none focus:bg-gray-300" placeholder="کەمترین">
                        <input name="max" type="text" class="w-4/12 px-2 py-1 text-xs text-center border border-gray-300 rounded-lg focus:outline-none focus:bg-gray-300" placeholder="بەرزترین">
                        <button class="mt-4 bg-green-600 text-white px-4 py-1  rounded-xl w-full">نرخ دیاری بکە</button>
                    </div>
                </form>
            </div>
            <div class="border-b absolute bottom-0">
                <div class="bg-green-600 flex items-center justify-center p-4">
                    <div class="basis-1١/12 px-6 text-center py-2 rounded bg-green-500">
                        <p class="text-center text-2xl text-white">داشکاندنی 30%</p>
                        <p class="text-center text-xs text-gray-200">هاوڕێکانت بێبەش مەکە لەم ئۆفەرە هەر ئێستا هاوبەشی پێبکە لە کڕینی جلوبەرگ</p>
                        <button class="bg-yellow-500 py-1 mt-4 w-8/12 mx-auto text-sm rounded-lg ">هاوبەشیکردن</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-9/12 p-4 overflow-y-scroll h-[610px]">
            @yield('content')
        </div>
    </div>
</body>

<script>
    let showModalUser = (id)=>{
        document.getElementById(id).classList.toggle('hidden')
    };

    let submitForm = () =>{
        document.getElementById('form').submit();
    }
</script>
</html>


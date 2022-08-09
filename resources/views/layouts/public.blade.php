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
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <i class="fa-solid fa-shirt h-10 w-10 rounded-full bg-green-600 text-white flex items-center justify-center"></i>
                <p class="font-bold">جلوبەرگ</p>
            </div>
            <div class="space-x-5 rtl:space-x-reverse text-gray-500/70 flex items-center">
                <a href="" class="text-gray-700 border-b-2 border-green-600 py-4">فرۆشگا</a>
                <a href="">داواکردن</a>
                <a href="">شوێن</a>
                <a href="">بلۆگ</a>
                <a href="">یارمەتی</a>
            </div>
        </div>
        <div class="basis-3/12 text-left text-xl space-x-5 rtl:space-x-reverse justify-end items-center flex text-gray-500">
            <i class="fa-solid fa-cart-shopping"></i>
            <i class="fas fa-heart"></i>
            <img src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg" class="w-12 rounded-full" alt="">
        </div>
    </div>
    <div class="flex ">
        <div class="basis-3/12  border-l-2 relative">
            <div class="border-b">
                <p class="my-1  p-2 px-5">فلتەر</p>
            </div>
            <div class="border-b">
                <p class="my-1 p-2 px-5">پۆلەکان</p>
                <form action="" class="px-5 text-gray-500 text-sm space-y-4">
                    <p>
                        <input type="checkbox" class="accent-green-500 text-white">
                        <span>پیاوان</span>
                    </p>

                    <p>
                        <input type="checkbox" class="accent-green-500 text-white">
                        <span>ئافرەتان</span>
                    </p>

                    <p>
                        <input type="checkbox" class="accent-green-500 text-white">
                        <span>منداڵان</span>
                    </p>

                    <p>
                        <input type="checkbox" class="accent-green-500 text-white">
                        <span>هاوینە</span>
                    </p>

                    <button class="w-full  text-center">ئەوانی تر <i class="fa-solid fa-angle-down"></i></button>
                </form>
            </div>
            <div class="border-b pb-2">
                <p class="my-2 p-2 px-5">مەودای نرخەکان</p>
                <div class="w-8/12 mx-auto mt-2 flex flex-wrap justify-between">
                    <input type="text" class="w-4/12 px-2 py-1 text-xs text-center border border-gray-300 rounded-lg focus:outline-none focus:bg-gray-300" placeholder="کەمترین">
                    <input type="text" class="w-4/12 px-2 py-1 text-xs text-center border border-gray-300 rounded-lg focus:outline-none focus:bg-gray-300" placeholder="کەمترین">
                    <button class="mt-4 bg-green-600 text-white px-4 py-1  rounded-xl w-full">نرخ دیاری بکە</button>
                </div>
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

</html>


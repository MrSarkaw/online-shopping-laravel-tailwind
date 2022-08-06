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
</head>
<body>
    <div id="app" dir="rtl" class="flex h-screen justify-between">
        <div class="bg-green-600 text-white h-screen basis-2/12 relative">
            <p class="text-xl text-center font-bold mt-2 border-b pb-3">جلوبەرگ</p>
            <div class="mt-4 px-3 text-center">
                <a href="{{route('user.index')}}">بەکارهێنەر</a>
            </div>
            <div class="mt-4 px-3 text-center">
                <a href="{{route('category.index')}}">بەشەکان</a>
            </div>
            <form class="absolute bottom-5  w-full text-center" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <Button class="bg-white text-green-600 w-11/12  p-2 px-4 rounded-xl">چوونەدەرەوە </Button>
            </form>
        </div>
       <div class="basis-10/12">
        <main class="py-4 w-10/12 mx-auto">
            <div class="shadow-lg p-2 mt-3">
                @yield('content')
            </div>
        </main>
       </div>

    </div>
</body>
</html>


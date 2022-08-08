@extends('layouts.app')
@section('content')
<div class="overflow-x-auto relative mt-4">
    <div class="grid grid-cols-3 gap-5">
        <div class="p-2 bg-green-600 rounded-lg flex text-white h-40 text-3xl items-center justify-center space-x-3 rtl:space-x-reverse">
            <i class="fas fa-users text-4xl "></i>
            <p class="">{{App\Models\User::count()}}</p>
        </div>

        <div class="p-2 bg-green-600 rounded-lg flex text-white h-40 text-3xl items-center justify-center space-x-3 rtl:space-x-reverse">
            <i class="fas fa-boxes text-4xl "></i>
            <p class="">{{App\Models\Category::count()}}</p>
        </div>

        <div class="p-2 bg-green-600 rounded-lg flex text-white h-40 text-3xl items-center justify-center space-x-3 rtl:space-x-reverse">
            <i class="fas fa-image text-4xl "></i>
            <p class="">{{App\Models\Post::count()}}</p>
        </div>

        <div class="p-2 bg-green-600 rounded-lg flex text-white h-40 text-3xl items-center justify-center space-x-3 rtl:space-x-reverse">
            <i class="fas fa-dollar-sign text-4xl "></i>
            <p class="">{{App\Models\Transaction::count()}}</p>
        </div>
    </div>
</div>
@endsection

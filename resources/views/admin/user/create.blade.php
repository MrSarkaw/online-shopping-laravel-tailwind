@extends('layouts.app')
@section('content')
    <a class="bg-green-500 px-6 py-2 rounded-xl text-white" href="{{route("user.index")}}">گەڕآندنەوە</a>
    <div class="h-96 flex items-center justify-center">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="grid grid-cols-3 gap-4 mt-3">
                <div>
                    <input name="name" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="ناو">
                </div>

                <div>
                    <input name="email" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="ناو">
                </div>

                <div>
                    <input name="password" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="ناو">
                </div>

                <div>
                    <input name="password_confirmation" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="ناو">
                </div>

                <div>
                    <input name="phone_number" type="text" class="bg-gray-300 px-3 py-1 focus:outline-none rounded" placeholder="ناو">
                </div>
            </div>

            <button class="mt-3">add</button>
        </form>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <a class="bg-green-500 px-6 py-2 rounded-xl text-white" href="{{route("user.create")}}">زیادکردن</a>



<div class="overflow-x-auto relative mt-4">
    <table class="w-full text-center text-sm  text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    ناو
                </th>
                <th scope="col" class="py-3 px-6">
                    ئیمەل
                </th>
                <th scope="col" class="py-3 px-6">
                    ژمارە مۆبایل
                </th>
                <th scope="col" class="py-3 px-6">
                    ناونیشان
                </th>
                <th scope="col" class="py-3 px-6">
                    کردارەکان
                </th>
            </tr>
        </thead>
        <tbody class="">
            @foreach ($data as $row)
                <tr>
                    <th scope="col" class="py-3 px-6">
                        {{$row->name}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->email}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                         {{$row->phone_number}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->address}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a href="{{ route('user.edit', ['user'=>$row->id]) }}">
                            <i class="fas fa-pen"></i>
                        </a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->links() !!}
</div>
@endsection

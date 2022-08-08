@extends('layouts.app')
@section('content')
    <a class="bg-green-500 px-6 py-2 rounded-xl text-white" href="{{route("post.create")}}">زیادکردن</a>


<div class="overflow-x-auto relative mt-4">
    <table class="w-full text-center text-sm  text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    تایتڵ
                </th>
                <th scope="col" class="py-3 px-6">
                    درێژە
                </th>
                <th scope="col" class="py-3 px-6">
                    نرخ
                </th>
                <th scope="col" class="py-3 px-6">
                    ڕەنگ
                </th>
                <th scope="col" class="py-3 px-6">
                    سایز
                </th>

                <th scope="col" class="py-3 px-6">
                    ژمارەی بەشەکان
                </th>
                <th scope="col" class="py-3 px-6">
                    وێنە
                </th>

                <th scope="col" class="py-3 px-6">
                    کاتی دروست بوون
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
                        {{$row->title}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->descritpion}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->price}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->color}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->size}}
                    </th>

                    <th scope="col" class="py-3 px-6">
                        {{$row->categories_count}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <img src="{{ asset('posts/'.$row->image.'') }}" class="w-32" alt="">
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->created_at->diffForHumans()}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <a href="{{ route('post.edit', ['post'=>$row->id]) }}">
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

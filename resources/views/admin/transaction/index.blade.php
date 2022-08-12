@extends('layouts.app')
@section('content')


<div class="overflow-x-auto relative mt-4">
    <table class="w-full text-center text-sm  text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="py-3 px-6">
                    بەکارهێنەر
                 </th>

                 <th scope="col" class="py-3 px-6">
                    ژمارەی مۆبایل
                 </th>

                 <th scope="col" class="py-3 px-6">
                    ناونیشان
                 </th>

                 <th scope="col" class="py-3 px-6">
                    کاڵاکە
                 </th>


                 <th scope="col" class="py-3 px-6">
                    ستەیت
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
            @foreach ($transactions as $row)
                <tr>

                    <th scope="col" class="py-3 px-6">
                        {{$row->user->name}}
                    </th>

                    <th scope="col" class="py-3 px-6">
                        {{$row->user->phone_number}}
                    </th>


                    <th scope="col" class="py-3 px-6">
                        {{$row->user->address}}
                    </th>

                    <th scope="col" class="py-3 px-6">
                        <a href="{{ route('post.edit', ['post' => $row->post_id]) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </th>


                    <th scope="col" class="py-3 px-6">
                        <form action="{{ route('transaction.update', ['transaction' => $row->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="{{$row->state == 1 ? 'text-green-500': 'text-red-500'}}">Change</button>
                        </form>
                    </th>

                    <th scope="col" class="py-3 px-6">
                        {{$row->created_at->diffForHumans()}}
                    </th>

                    <th>
                        <form action="{{ route('transaction.destroy', ['transaction' => $row->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button><i class="fas fa-trash"></i></button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $transactions->links() !!}
</div>
@endsection

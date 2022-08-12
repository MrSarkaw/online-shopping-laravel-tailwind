@extends('layouts.public')

@section('content')
    <div class="flex items-center justify-between">

        <div>
            <a href="{{ route('profile.edit', Auth::id()) }}"><i class="fas fa-cog text-xl" ></i></a>
        </div>
        <div class="text-left">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <div>
                    <p>{{ auth()->user()->name }}</p>
                    <p>{{ auth()->user()->email }}</p>
                </div>
                <img src="https://png.pngtree.com/png-vector/20191101/ourmid/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg" class="w-20 rounded-full " alt="">
            </div>

        </div>

    </div>
    <table class="w-full text-center text-sm  text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    تایتڵ
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
            @foreach ($posts as $row)
                <tr>
                    <th scope="col" class="py-3 px-6">
                        {{$row->post->title}}
                    </th>

                    <th scope="col" class="py-3 px-6">
                        {{$row->post->price}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->post->color}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->post->size}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <img src="{{ asset('posts/'.$row->post->image.'') }}" class="w-32" alt="">
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{$row->created_at->diffForHumans()}}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        @if($row->state == 0)
                            <form action="{{ route('delete', ['id' => $row->id]) }}" id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteData()" class="text-red-500"><i class="fas fa-trash"></i></button>
                            </form>
                        @endif
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
         let deleteData = ()=>{
            Swal.fire({
                title: 'دڵنیای لە سڕینەوەی',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بەڵی',
                cancelButtonText: 'نەخێر'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'سڕایەوە!',
                    'دەیتاکە بەسەرکەوتووی سڕایەوە',
                    'success'
                    )

                    document.getElementById('deleteForm').submit();
                }
                })

        }
    </script>
@endsection

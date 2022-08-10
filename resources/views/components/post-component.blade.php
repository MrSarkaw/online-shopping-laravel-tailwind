<a href="{{ route('showpost', ['id' =>$row->id]) }}" class="h-72 rounded-2xl overflow-hidden relative">
    <img src="{{asset('posts/'.$row->image)}}" class="h-72 object-cover w-full" alt="">
    <div class="absolute h-full w-full bg-gradient-to-t from-black/80 to-transparent top-0 left-0">
        @auth
            <form action="{{ route('addToFavCart', ['id'=>$row->id, 'cart'=>0]) }}" method="post">
                @csrf
                <button class="w-9 h-9 bg-black/30 text-white  rounded-xl pt-1 relative top-2 right-2">
                    <i class="fas fa-heart {{ in_array($row->id, $favID)? 'text-red-500' :'' }}"></i>
                </button>
            </form>
        @endauth

        <div class="absolute bottom-3 px-2 w-full space-y-5">
            <p class="text-white text-xl">{{ $row->title }}</p>
            <p class="bg-green-800/80 text-center text-white text-sm rounded-lg p-1 border-2 border-green-700 ">
                {{$row->price}} د.ع
            </p>
        </div>
    </div>
</a>

<a href="{{ route('showPost', ['id' => $row->id]) }}" class="h-72 rounded-2xl overflow-hidden relative">
    <img src="{{ asset('posts/' . $row->image) }}" alt="" class="h-72 w-full object-cover">
    <div class="absolute h-full w-full  bg-gradient-to-t from-black/80 to-transparent top-0 left-0">
        @auth
            <form action="{{ route('AddToFavCard', ['id' => $row->id, 'cart' => 0]) }}" method="POST">
                @csrf
                <button
                    class="w-9 h-9 bg-black/30 text-white rounded-xl flex items-center justify-center relative top-2 right-2">
                    <i class="fas fa-heart {{ in_array($row->id, $favID) ? 'text-red-500' : '' }}"></i>
                </button>
            </form>
        @endauth
        <div class="absolute bottom-3 px-2 w-full space-y-5">
            <p class="text-white text-xl">{{ $row->title }}</p>
            @if ($row->discount > 0)
            <p class="bg-yellow-800/80 text-center text-sm  text-white rounded-lg p-1 pt-2 border-2 border-yellow-700">
                <del class=" pl-4">
                    {{ $row->price}} د.ع
                </del>
                <span class="pr-4">{{ $row->discount > 0 ? $row->price * (1 - $row->discount) : $row->price }} د.ع  </span>
            </p>
            @else
            <p class="bg-green-800/80 text-center text-sm text-white rounded-lg p-1 pt-2 border-2 border-green-700">
                {{ $row->price }} د.ع
            </p>
            @endif
        </div>
    </div>
</a>

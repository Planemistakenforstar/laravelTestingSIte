@props(['title', 'url', 'art' => null])

<a href="{{ route('dashboard.album', ['url' => $url]) }}"
   class="block rounded-lg overflow-hidden bg-white shadow hover:shadow-lg transition">
    @if ($art)
        <img src="{{ $art }}" alt="{{ $title }}" class="w-full h-48 object-cover">
    @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
            No artwork
        </div>
    @endif
    <div class="p-3">
        <h3 class="font-semibold text-sm truncate">{{ $title }}</h3>
    </div>
</a>

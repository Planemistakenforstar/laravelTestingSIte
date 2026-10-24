<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bandcamp Artist
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto px-4">
        <x-bandcamp.artist-input />

        @if (empty($albums))
            <p class="text-sm text-gray-500">
                No albums found for <code>{{ $artistUrl }}</code>.
            </p>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach ($albums as $album)
                    <x-bandcamp.album-card
                        :title="$album['title']"
                        :url="$album['url']"
                        :art="$album['art'] ?? null"
                    />
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>

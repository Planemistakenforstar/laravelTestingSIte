<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Now playing
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto px-4">
        <a href="{{ route('dashboard.artist', ['url' => $albumUrl]) }}"
           class="text-sm underline mb-4 inline-block">&larr; Back to artist</a>

        <x-bandcamp.album-player :embed-html="$embedHtml" :album-url="$albumUrl" />
    </div>
</x-app-layout>

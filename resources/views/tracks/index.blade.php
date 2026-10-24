<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tracks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @forelse ($tracks as $track)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 flex items-center justify-between">
                        <div>
                            <a href="{{ route('tracks.show', $track) }}"
                               class="font-medium text-gray-900 hover:underline">
                                {{ $track->title }}
                            </a>
                            <p class="text-sm text-gray-600">
                                {{ $track->artist->name }}
                                @if($track->city) — {{ $track->city }} @endif
                                @if($track->genre) — {{ $track->genre }} @endif
                            </p>
                        </div>
                        <span class="text-xs text-gray-500">{{ $track->plays()->count() }} plays</span>
                    </div>
                </div>
            @empty
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-600">No tracks yet.</div>
                </div>
            @endforelse

            <div>{{ $tracks->links() }}</div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{  __('Tracks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="p-8">
                    @if (session('status'))
                        <div class="mb-6 rounded-md bg-green-50 p-3 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-6 text-center">
                        <div class="inline-flex h-10 w-10 items-center justify-center rounded-md bg-red-600 text-white text-lg">
                            ♪
                        </div>
                        <h1 class="mt-4 text-xl font-bold text-gray-900">{{ $track->title }}</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $track->artist->name }}
                            @if($track->city) — {{ $track->city }} @endif
                            @if($track->genre) — {{ $track->genre }} @endif
                        </p>
                    </div>

                    <audio controls src="{{ Storage::url($track->file_path) }}" class="w-full"></audio>

                    <div class="mt-6 flex items-center justify-between text-sm text-gray-600">
                        <span>
                            Cleared for airplay:
                            @if($track->airplay_permission)
                                <span class="text-green-700 font-medium">Yes</span>
                            @else
                                <span class="text-gray-500">No</span>
                            @endif
                        </span>
                        <span>Plays: {{ $track->plays()->count() }}</span>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
                            ← Back to dashboard
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

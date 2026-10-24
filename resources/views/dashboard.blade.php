<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (auth()->user()->isArtist())
                {{-- Upload CTA --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold mb-4">Upload a track</h3>
                        <p class="text-sm text-gray-600 mb-4">
                            Share a song with local broadcasters and podcasters. You keep the rights;
                            you grant airplay permission when you upload.
                        </p>
                        <a href="{{ route('dashboard.tracks.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                            Upload a track
                        </a>
                    </div>
                </div>

                {{-- My tracks --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold mb-4">My tracks</h3>

                        @forelse (auth()->user()->tracks()->latest()->get() as $track)
                            <div class="flex items-center justify-between py-2 border-b last:border-0">
                                <div>
                                    <a href="{{ route('dashboard.tracks.show', $track) }}"
                                       class="font-medium hover:underline">
                                        {{ $track->title }}
                                    </a>
                                    <span class="text-xs text-gray-500">
                                        {{ $track->status }} · {{ $track->plays()->count() }} plays
                                    </span>
                                </div>
                                @if ($track->airplay_permission)
                                    <span class="text-xs text-green-700">cleared</span>
                                @else
                                    <span class="text-xs text-gray-500">not cleared</span>
                                @endif
                            </div>
                        @empty
                            <p class="text-sm text-gray-600">No tracks yet.</p>
                        @endforelse
                    </div>
                </div>
            @endif

            {{-- Original Breeze welcome block --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

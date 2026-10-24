<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload a track') }}
        </h2>
    </x-slot>
    <div class="py-12">
<div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-3">
            <div class="grid-cols-12 sm:grid-cols-6 bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="p-8">
                    <div class="mb-6 text-center">
                        <div class="inline-flex h-10 w-10 items-center justify-center rounded-md bg-red-600 text-white text-lg">
                            ♪
                        </div>
                        <h1 class="mt-4 text-xl font-bold text-gray-900">Share a track</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Local broadcasters and podcasters can play this on air, royalty-free, with credit to you.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-6 rounded-md bg-green-50 p-3 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('dashboard.tracks.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="my-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text"
                                          name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-4">
                            <div>
                                <x-input-label for="genre" :value="__('Genre')" />
                                <x-text-input id="genre" class="block mt-1 w-full" type="text"
                                              name="genre" :value="old('genre')" placeholder="e.g. indie rock" />
                                <x-input-error :messages="$errors->get('genre')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" class="block mt-1 w-full" type="text"
                                              name="city" :value="old('city')" placeholder="e.g. Thessaloniki" />
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                        </div>

                        <div class="my-4">
                            <x-input-label for="file" :value="__('Audio file (mp3 or wav, max 20MB)')" />
                            <input id="file" type="file" name="file" accept=".mp3,.wav,audio/*" required
                                   class="block mt-1 w-full text-sm text-gray-700
                                          file:mr-3 file:rounded-md file:border-0
                                          file:bg-red-600 file:px-4 file:py-2
                                          file:text-sm file:font-semibold file:text-white
                                          hover:file:bg-red-700">
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>

                        <div class="my-6 rounded-md border border-gray-200 bg-gray-50 p-4">
                            <label for="airplay_permission" class="flex items-start gap-3">
                                <input id="airplay_permission" type="checkbox" name="airplay_permission" value="1"
                                       {{ old('airplay_permission') ? 'checked' : '' }}
                                       class="mt-1 rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500">
                                <span class="text-sm text-gray-700">
                                    I own this recording and allow local broadcasters and podcasters to play it on air,
                                    royalty-free, with credit to me. I can revoke this permission at any time.
                                </span>
                            </label>
                            <x-input-error :messages="$errors->get('airplay_permission')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between my-6">
                            <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
                                Cancel
                            </a>
                            <x-primary-button class="bg-red-600 hover:bg-red-700 focus:ring-red-500">
                                {{ __('Upload track') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
             <div class="grid-cols-12 sm:grid-cols-6 bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="p-8">
                    <div class="mb-6 text-center">
                        <div class="inline-flex h-10 w-10 items-center justify-center rounded-md bg-red-600 text-white text-lg">
                            ♪
                        </div>
                        <h1 class="mt-4 text-xl font-bold text-gray-900">Add your lyrics</h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Local broadcasters and podcasters can play this on air, royalty-free, with credit to you.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mb-6 rounded-md bg-green-50 p-3 text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('dashboard.tracks.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="my-4">
                            <x-input-label for="file" :value="__('Text file (docx or pdf, max 1MB)')" />
                            <input id="file" type="file" name="file" accept=".docx,.pdf" required
                                   class="block mt-1 w-full text-sm text-gray-700
                                          file:mr-3 file:rounded-md file:border-0
                                          file:bg-red-600 file:px-4 file:py-2
                                          file:text-sm file:font-semibold file:text-white
                                          hover:file:bg-red-700">
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between my-6">
                            <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
                                Cancel
                            </a>
                            <x-primary-button class="bg-red-600 hover:bg-red-700 focus:ring-red-500">
                                {{ __('Upload lyrics') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>

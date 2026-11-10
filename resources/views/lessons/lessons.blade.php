<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lessons') }}
        </h2>

    </x-slot>


    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('dashboard') }}"
            class="text-sm underline mb-4 inline-block">
            &larr; {{ __('Back to dashboard') }}
    </div>
</x-app-layout>
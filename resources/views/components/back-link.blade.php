@props(['href' => '/', 'label' => 'Back to home'])

<a href="{{ $href }}"
   {{ $attributes->merge(['class' =>
   'mb-4 inline-flex items-center gap-2 text-sm text-gray-500 hover:text-red-600']) }}>
    <x-heroicon-o-arrow-left class="h-4 w-4" />
    <span>{{ $label }}</span>
</a>

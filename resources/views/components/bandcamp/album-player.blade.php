@props(['embedHtml' => '', 'albumUrl' => null])

<div class="bandcamp-player">
    @if ($embedHtml)
        {!! $embedHtml !!}
    @else
        <p class="text-sm text-gray-500">
            Player unavailable.
            @if ($albumUrl)
                <a href="{{ $albumUrl }}" target="_blank" rel="noopener" class="underline">Open on Bandcamp</a>
            @endif
        </p>
    @endif
</div>

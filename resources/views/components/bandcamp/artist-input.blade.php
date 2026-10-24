<form method="GET" action="{{ route('dashboard.artist') }}" class="flex gap-2 mb-6">
    <input type="url"
           name="url"
           placeholder="https://artist.bandcamp.com"
           value="{{ request('url') }}"
           required
           class="flex-1 border rounded px-3 py-2 text-sm">
    <button type="submit"
            class="bg-black text-white px-4 py-2 rounded text-sm">
        Load artist
    </button>
</form>

<h1>{{ $track->title }}</h1>
<p>{{ $track->artist->name }} — {{ $track->city }} — {{ $track->genre }}</p>

<audio controls src="{{ Storage::url($track->file_path) }}"></audio>

<p>Cleared for airplay: {{ $track->airplay_permission ? 'Yes' : 'No' }}</p>
<p>Plays: {{ $track->plays()->count() }}</p>

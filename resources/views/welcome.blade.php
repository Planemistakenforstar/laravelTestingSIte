<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Bandcamp Streamer') }} — Stream Bandcamp in your browser</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-900">

    {{-- Top bar: brand + auth links --}}
    <header class="w-full">
        <nav class="max-w-7xl mx-auto flex items-center justify-between px-6 py-5">
            <a href="/" class="flex items-center gap-2 font-semibold text-lg">
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-md bg-red-500 text-white">
                    ♪
                </span>
                <span>Bandcamp Streamer</span>
            </a>

            <div class="flex items-center gap-3 text-sm">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="rounded-md bg-red-500 px-4 py-2 font-semibold text-white hover:bg-red-600 transition">
                        Go to dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="rounded-md px-4 py-2 font-semibold text-gray-700 hover:text-red-600 transition">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="rounded-md bg-red-500 px-4 py-2 font-semibold text-white hover:bg-red-600 transition">
                            Create account
                        </a>
                    @endif
                @endauth
            </div>
        </nav>
    </header>

    {{-- Hero --}}
    <main class="max-w-7xl mx-auto px-6">
        <section class="grid md:grid-cols-2 gap-12 items-center py-16 lg:py-24">
            <div>
                <p class="inline-block mb-4 rounded-full bg-red-50 px-3 py-1 text-xs font-semibold tracking-wide text-red-600 uppercase">
                    Independent music, no middlemen
                </p>

                <h1 class="text-4xl sm:text-5xl font-bold leading-tight tracking-tight">
                    Stream the music you love<br class="hidden sm:block">
                    <span class="text-red-500">straight from Bandcamp.</span>
                </h1>
                <p class="mt-6 text-lg text-gray-600 max-w-lg">
                    Paste an artist link, browse their discography, and press play — all in one place.
                    No downloads, no re-uploads, no algorithm. Just the artists' own storefronts,
                    playing in your browser.
                </p>
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="rounded-md bg-red-500 px-5 py-3 text-white font-semibold hover:bg-red-600 transition">
                            Open dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="rounded-md bg-red-500 px-5 py-3 text-white font-semibold hover:bg-red-600 transition">
                            Start listening — it's free
                        </a>
                        <a href="{{ route('login') }}"
                           class="rounded-md border border-gray-300 px-5 py-3 text-gray-700 font-semibold hover:border-gray-400 transition">
                            I already have an account
                        </a>
                    @endauth
                </div>
            </div>

            {{-- Mock player card --}}
            <div class="relative">
                <div class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-red-100 via-white to-red-50 blur-2xl opacity-70"></div>
                <div class="relative rounded-2xl bg-white shadow-xl ring-1 ring-gray-200 p-6">
                    <div class="flex items-center gap-4">
                        <div class="h-20 w-20 rounded-lg bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center text-white text-2xl font-bold">
                            ♫
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wider text-gray-400">Now playing</p>
                            <p class="font-semibold">Midnight Signals</p>
                            <p class="text-sm text-gray-500">Nova Coast</p>
                        </div>
                    </div>

                    <div class="mt-6 h-1.5 w-full rounded-full bg-gray-100 overflow-hidden">
                        <div class="h-full w-2/5 bg-red-500"></div>
                    </div>

                    <div class="mt-3 flex justify-between text-xs text-gray-400">
                        <span>1:24</span>
                        <span>3:41</span>
                    </div>

                    <div class="mt-6 flex items-center justify-center gap-6 text-gray-600">
                        <button class="text-xl" aria-label="Previous">⏮</button>
                        <button class="h-12 w-12 rounded-full bg-red-500 text-white text-xl flex items-center justify-center hover:bg-red-600 transition" aria-label="Play">
                            ▶
                        </button>
                        <button class="text-xl" aria-label="Next">⏭</button>
                    </div>

                    <p class="mt-6 text-center text-xs text-gray-400">
                        Played via Bandcamp's official embed
                    </p>
                </div>
            </div>
        </section>

        {{-- Features --}}
        <section class="py-16 border-t border-gray-200">
            <h2 class="text-2xl font-bold tracking-tight text-center">Built for the way Bandcamp fans listen</h2>
            <p class="mt-2 text-center text-gray-600 max-w-xl mx-auto">
                Everything you need to explore an artist's catalog without leaving the page.
            </p>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rounded-xl bg-white p-6 ring-1 ring-gray-200">
                    <div class="h-10 w-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center text-xl">🎧</div>
                    <h3 class="mt-4 font-semibold">Browse by artist</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Drop in any artist page URL and instantly see their albums and tracks laid out as cards.
                    </p>
                </div>

                <div class="rounded-xl bg-white p-6 ring-1 ring-gray-200">
                    <div class="h-10 w-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center text-xl">▶</div>
                    <h3 class="mt-4 font-semibold">Play instantly</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Click an album and the official Bandcamp player loads right on the page — no redirects.
                    </p>
                </div>

                <div class="rounded-xl bg-white p-6 ring-1 ring-gray-200">
                    <div class="h-10 w-10 rounded-lg bg-red-50 text-red-500 flex items-center justify-center text-xl">❤</div>
                    <h3 class="mt-4 font-semibold">Support the artists</h3>
                    <p class="mt-2 text-sm text-gray-600">
                        Playback goes through Bandcamp's own player, so artists still get their plays and sales.
                    </p>
                </div>
            </div>
        </section>

        {{-- How it works --}}
        <section class="py-16 border-t border-gray-200">
            <h2 class="text-2xl font-bold tracking-tight text-center">How it works</h2>

            <ol class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <li class="flex gap-4">
                    <span class="flex-shrink-0 h-8 w-8 rounded-full bg-red-500 text-white flex items-center justify-center font-semibold">1</span>
                    <div>
                        <h3 class="font-semibold">Create an account</h3>
                        <p class="mt-1 text-sm text-gray-600">Sign up in seconds so your dashboard is yours.</p>
                    </div>
                </li>
                <li class="flex gap-4">
                    <span class="flex-shrink-0 h-8 w-8 rounded-full bg-red-500 text-white flex items-center justify-center font-semibold">2</span>
                    <div>
                        <h3 class="font-semibold">Paste an artist link</h3>
                        <p class="mt-1 text-sm text-gray-600">Any <code class="text-xs">artist.bandcamp.com</code> URL works.</p>
                    </div>
                </li>
                <li class="flex gap-4">
                    <span class="flex-shrink-0 h-8 w-8 rounded-full bg-red-500 text-white flex items-center justify-center font-semibold">3</span>
                    <div>
                        <h3 class="font-semibold">Press play</h3>
                        <p class="mt-1 text-sm text-gray-600">Open an album card and listen right there.</p>
                    </div>
                </li>
            </ol>
        </section>

        {{-- Final CTA --}}
        <section class="py-16">
            <div class="rounded-2xl bg-gray-900 text-white p-10 text-center">
                <h2 class="text-2xl sm:text-3xl font-bold tracking-tight">Ready to stream?</h2>
                <p class="mt-3 text-gray-300 max-w-xl mx-auto">
                    Join and start listening to independent music the way it was meant to be heard — from the artists themselves.
                </p>

                <div class="mt-6 flex justify-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="rounded-md bg-white text-gray-900 px-5 py-3 font-semibold hover:bg-gray-100 transition">
                            Go to dashboard
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="rounded-md bg-red-500 px-5 py-3 font-semibold hover:bg-red-600 transition">
                            Create free account
                        </a>
                        <a href="{{ route('login') }}"
                           class="rounded-md border border-white/30 px-5 py-3 font-semibold hover:border-white/60 transition">
                            Log in
                        </a>
                    @endauth
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-6 py-8 text-sm text-gray-500 flex flex-col sm:flex-row justify-between gap-3">
            <p>&copy; {{ date('Y') }} Bandcamp Streamer. Not affiliated with Bandcamp.</p>
            <p>Music lives on <a href="https://bandcamp.com" target="_blank" rel="noopener" class="underline hover:text-gray-700">bandcamp.com</a></p>
        </div>
    </footer>

</body>
</html>

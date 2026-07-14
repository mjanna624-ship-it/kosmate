<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KosMate</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body
class="font-sans antialiased min-h-screen bg-gradient-to-br from-pink-200 via-fuchsia-200 to-purple-300">

    <div
        class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            <!-- Logo -->

            <div class="text-center mb-8">

                <a href="/">

                    <div
                        class="text-6xl mb-3">

                        🌸

                    </div>

                    <h1
                        class="text-5xl font-bold text-white drop-shadow-lg">

                        KosMate

                    </h1>

                    <p
                        class="text-pink-50 mt-2">

                        Sahabat terbaik anak kost 💖

                    </p>

                </a>

            </div>

            <!-- Card -->

            <div
                class="bg-white/90 backdrop-blur-md rounded-3xl shadow-2xl px-8 py-8">

                {{ $slot }}

            </div>

        </div>

    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blaster44</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0A0A0A] text-white min-h-screen">

    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-[700px] h-[700px] bg-lime-400/10 blur-[200px] rounded-full left-1/2 top-20 -translate-x-1/2"></div>
    </div>

    <div class="relative min-h-screen flex items-start justify-center px-6 pt-16 pb-16">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">

                <a href="/">
    <img
        src="{{ asset('images/logo.png') }}"
        alt="Blaster44"
        class="w-14 mx-auto mb-4"
    >
</a>

                <h1 class="text-4xl font-black uppercase">
                    <span class="text-lime-400">Blaster44</span>
                </h1>

                <p class="text-gray-400 mt-2">
                    Rejoignez l'équipe
                </p>

            </div>

            <div class="bg-[#111111] border border-lime-400/20 rounded-3xl p-8 shadow-2xl shadow-lime-500/10">
                {{ $slot }}
            </div>

        </div>

    </div>

</body>

</html>

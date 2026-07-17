<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Blaster44')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<a href="https://wa.me/32473476373"
   target="_blank"
   class="fixed bottom-6 right-6 bg-lime-400 text-black font-bold px-6 py-4 rounded-full shadow-2xl z-50 hover:scale-110 transition">

    📱 Réserver

</a>
<a href="https://wa.me/32473476373"
   target="_blank"
   class="fixed bottom-6 right-6 z-50 bg-lime-400 text-black px-5 py-4 rounded-full font-bold shadow-2xl hover:scale-110 transition">

    💬 WhatsApp

</a>

<body>

    <x-navbar />

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>

</html>
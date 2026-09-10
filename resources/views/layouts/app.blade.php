<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gel Blaster en Belgique | Blaster44')</title>
    <meta name="description" content="@yield('description', 'Découvrez le Gel Blaster en Belgique avec Blaster44 : parties immersives, terrains et formules pour groupes jusqu’à 20 joueurs.')">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <link rel="canonical" href="@yield('canonical', rtrim(config('app.url'), '/') . request()->getPathInfo())">

    <!-- Open Graph -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:locale" content="fr_BE">
    <meta property="og:site_name" content="Blaster44">
    <meta property="og:title" content="@yield('og_title', 'Gel Blaster en Belgique | Blaster44')">
    <meta property="og:description" content="@yield('og_description', 'Découvrez le Gel Blaster en Belgique avec Blaster44 : parties immersives, terrains et formules pour groupes jusqu’à 20 joueurs.')">
    <meta property="og:url" content="@yield('og_url', rtrim(config('app.url'), '/') . request()->getPathInfo())">
    <meta property="og:image" content="@yield('og_image', rtrim(config('app.url'), '/') . '/images/hero.jpg')">

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Gel Blaster en Belgique | Blaster44')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Découvrez le Gel Blaster en Belgique avec Blaster44.')">
    <meta name="twitter:image" content="@yield('twitter_image', rtrim(config('app.url'), '/') . '/images/hero.jpg')">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden">

    <x-navbar />

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Réseaux sociaux flottants -->
    <div
        style="
            position: fixed;
            left: 20px;
            top: 50vh;
            transform: translateY(-50%);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 16px;
        "
    >

        <!-- Facebook -->
        <a
            href="https://www.facebook.com/profile.php?id=61592819595418&locale=fr_FR"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="Facebook Blaster44"
            style="
                width: 56px;
                height: 56px;
                border-radius: 50%;
                background: #111111;
                border: 2px solid rgba(163, 230, 53, 0.7);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 0 20px rgba(163, 230, 53, 0.22);
                transition: all 0.3s ease;
            "
            onmouseover="this.style.background='#a3e635'; this.style.color='#000'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.background='#111111'; this.style.color='#fff'; this.style.transform='scale(1)';"
        >
            <svg
                width="30"
                height="30"
                viewBox="0 0 24 24"
                fill="currentColor"
            >
                <path d="M14 8h3V4h-3c-3.3 0-5 1.7-5 5v3H6v4h3v8h4v-8h3l1-4h-4V9c0-.7.3-1 1-1z"/>
            </svg>
        </a>

        <!-- TikTok -->
        <a
            href="https://www.tiktok.com/@blaster_44"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="TikTok Blaster44"
            style="
                width: 56px;
                height: 56px;
                border-radius: 50%;
                background: #111111;
                border: 2px solid rgba(163, 230, 53, 0.7);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 0 20px rgba(163, 230, 53, 0.22);
                transition: all 0.3s ease;
            "
            onmouseover="this.style.background='#a3e635'; this.style.color='#000'; this.style.transform='scale(1.1)';"
            onmouseout="this.style.background='#111111'; this.style.color='#fff'; this.style.transform='scale(1)';"
        >
            <svg
                width="30"
                height="30"
                viewBox="0 0 24 24"
                fill="currentColor"
            >
                <path d="M19.6 7.1c-1.5-.1-2.8-1-3.5-2.3-.3-.6-.5-1.3-.5-2.1h-4.1v13.8c0 1.6-1.3 2.9-2.9 2.9s-2.9-1.3-2.9-2.9 1.3-2.9 2.9-2.9c.3 0 .6.1.9.1v-4.2c-.3 0-.6-.1-.9-.1-4 0-7.2 3.2-7.2 7.2s3.2 7.2 7.2 7.2 7.2-3.2 7.2-7.2V9.9c1.2.9 2.7 1.4 4.3 1.4V7.1z"/>
            </svg>
        </a>

    </div>

</body>

</html>
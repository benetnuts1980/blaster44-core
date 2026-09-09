<nav class="fixed top-0 left-0 right-0 z-50 bg-black/50 border-b border-white/10">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2">

        {{-- Logo Blaster44 --}}
        <a href="/" class="flex items-center">
            <img
                src="{{ asset('images/logo.png') }}"
                class="h-12 md:h-14"
                alt="Blaster44 Gel Blaster"
            >
        </a>

        {{-- Menu desktop --}}
        <div class="hidden md:flex items-center gap-7 text-white font-semibold">

            <a href="/#home" class="hover:text-lime-400 transition">
                Accueil
            </a>

            <a href="/#formules" class="hover:text-lime-400 transition">
                Formules
            </a>

            <a href="/#galerie" class="hover:text-lime-400 transition">
                Galerie
            </a>

            <a href="/deroulement" class="hover:text-lime-400 transition">
                Déroulement
            </a>

            <a href="/repliques" class="hover:text-lime-400 transition">
                Répliques
            </a>

            <a href="/#contact" class="hover:text-lime-400 transition">
                Contact
            </a>

        </div>

        {{-- Compte / réservation desktop --}}
        <div class="hidden md:flex items-center gap-3">

            @auth

                <a href="/dashboard"
                   class="text-lime-400 font-bold">
                    👤 {{ auth()->user()->pseudo }}
                </a>

                <a href="/profile"
                   class="text-white hover:text-lime-400 transition">
                    Mon compte
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="border border-red-500 text-red-500 px-3 py-2 rounded-xl hover:bg-red-500 hover:text-white transition"
                    >
                        Déconnexion
                    </button>
                </form>

            @else

                <a href="/login"
                   class="text-white hover:text-lime-400 transition">
                    Connexion
                </a>

                <a href="/register"
                   class="border border-lime-400 text-lime-400 px-3 py-2 rounded-xl hover:bg-lime-400 hover:text-black transition">
                    Inscription
                </a>

            @endauth

            <a href="/reserver"
               class="rounded-xl bg-lime-400 px-5 py-2.5 font-bold text-black transition hover:scale-105">
                🔫 Réserver
            </a>

        </div>

        {{-- Mobile --}}
        <div class="mobile-navbar-actions">

            <a href="/reserver"
               class="rounded-xl bg-lime-400 px-4 py-2.5 font-bold text-black whitespace-nowrap">
                🔫 Réserver
            </a>

            <button
                type="button"
                id="mobile-menu-button"
                class="mobile-menu-button"
                aria-label="Ouvrir le menu"
                aria-expanded="false"
            >
                <span id="mobile-menu-open">☰</span>
                <span id="mobile-menu-close" class="hidden">✕</span>
            </button>

        </div>

    </div>

    {{-- Menu mobile --}}
    <div id="mobile-menu" class="mobile-menu">

        <a href="/#home">Accueil</a>
        <a href="/#formules">Formules</a>
        <a href="/#galerie">Galerie</a>
        <a href="/deroulement">Déroulement</a>
        <a href="/repliques">Répliques</a>
        <a href="/#contact">Contact</a>

        <div class="mobile-menu-separator"></div>

        @auth

            <a href="/dashboard" class="text-lime-400">
                👤 {{ auth()->user()->pseudo }}
            </a>

            <a href="/profile">
                Mon compte
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="mobile-logout">
                    Déconnexion
                </button>
            </form>

        @else

            <a href="/login">Connexion</a>
            <a href="/register">Inscription</a>

        @endauth

    </div>
</nav>

<style>
    /* Mobile uniquement */
    .mobile-navbar-actions {
        display: none;
    }

    .mobile-menu {
        display: none;
    }

    @media (max-width: 767px) {

        .mobile-navbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .mobile-menu-button {
            width: 46px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #a3ff12;
            border-radius: 12px;
            background: transparent;
            color: #a3ff12;
            font-size: 27px;
            line-height: 1;
        }

        .mobile-menu {
            background: rgba(0, 0, 0, 0.96);
            border-top: 1px solid rgba(255, 255, 255, 0.10);
            padding: 20px;
        }

        .mobile-menu.open {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .mobile-menu a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
        }

        .mobile-menu a:hover {
            color: #a3ff12;
        }

        .mobile-menu-separator {
            height: 1px;
            background: rgba(255, 255, 255, 0.15);
            margin: 2px 0;
        }

        .mobile-logout {
            border: 0;
            padding: 0;
            background: none;
            color: #ef4444;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const button = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('mobile-menu-open');
        const closeIcon = document.getElementById('mobile-menu-close');

        if (!button || !menu) {
            return;
        }

        button.addEventListener('click', function () {

            const open = menu.classList.toggle('open');

            openIcon.classList.toggle('hidden', open);
            closeIcon.classList.toggle('hidden', !open);

            button.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    });
</script>
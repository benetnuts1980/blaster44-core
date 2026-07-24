<nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-black/40 border-b border-white/10">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <a href="/" class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" class="h-14" alt="Blaster44">
        </a>

        <div class="hidden md:flex items-center gap-8 text-white font-semibold">

            <a href="#home" class="hover:text-lime-400 transition">Accueil</a>

            <a href="#formules" class="hover:text-lime-400 transition">Formules</a>

            <a href="/anniversaire" class="hover:text-lime-400 transition">
    Anniversaire
</a>

<a href="/team-building" class="hover:text-lime-400 transition">
    Team Building
</a>

            <a href="/anniversaire" class="hover:text-lime-400 transition">Anniversaire</a>

            <a href="/terrains" class="hover:text-lime-400 transition">
    Terrains
</a>

            <a href="#galerie" class="hover:text-lime-400 transition">Galerie</a>

            <a href="#contact" class="hover:text-lime-400 transition">Contact</a>

            <a href="/ranking" class="hover:text-lime-400 transition">
                🏆 Classement
            </a>
            <a href="/faq" class="hover:text-lime-400 transition">
    FAQ
</a>

        </div>

        <div class="flex items-center gap-3">

            @guest

                <a
                    href="{{ route('login') }}"
                    class="text-white font-semibold hover:text-lime-400 transition"
                >
                    Connexion
                </a>

                <a
                    href="{{ route('register') }}"
                    class="rounded-xl border border-lime-400 px-4 py-2 text-lime-400 font-bold hover:bg-lime-400 hover:text-black transition"
                >
                    Inscription
                </a>

            @else

                <a
                    href="{{ route('dashboard') }}"
                    class="text-white font-semibold hover:text-lime-400 transition"
                >
                    👤 Mon compte
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="text-red-400 font-semibold hover:text-red-300 transition"
                    >
                        Déconnexion
                    </button>
                </form>

            @endguest

            <a href="/reserver"
               class="rounded-xl bg-lime-400 px-6 py-3 font-bold text-black transition hover:scale-105">
                Réserver
            </a>

        </div>

    </div>
</nav>
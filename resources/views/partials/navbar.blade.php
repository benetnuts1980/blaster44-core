<nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-black/50 border-b border-white/10">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-2">

        <a href="/" class="flex items-center">
            <img
                src="{{ asset('images/logo.png') }}"
                class="h-12 md:h-14"
                alt="Blaster44 Gel Blaster"
            >
        </a>

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

        <div class="flex items-center gap-3">

            @auth

                <a href="/dashboard"
                   class="text-lime-400 font-bold hidden sm:block">
                    👤 {{ auth()->user()->pseudo }}
                </a>

                <a href="/profile"
                   class="text-white hover:text-lime-400 transition hidden lg:block">
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
                   class="text-white hover:text-lime-400 transition hidden sm:block">
                    Connexion
                </a>

                <a href="/register"
                   class="border border-lime-400 text-lime-400 px-3 py-2 rounded-xl hover:bg-lime-400 hover:text-black transition hidden sm:block">
                    Inscription
                </a>

            @endauth

            <a href="/reserver"
               class="rounded-xl bg-lime-400 px-5 py-2.5 font-bold text-black transition hover:scale-105">
                🔫 Réserver
            </a>

        </div>

    </div>
</nav>
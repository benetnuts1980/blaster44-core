<section id="formules" class="bg-[#0A0A0A] py-24">

    @php
        $formulas = \App\Models\Formula::where('active', true)->get();
    @endphp

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-5xl font-black text-center text-white mb-16">
            Nos <span class="text-lime-400">Formules</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            @foreach($formulas as $formula)

                @php
                    $color = match(strtolower($formula->name)) {
                        'recrue' => 'text-lime-400',
                        'assault' => 'text-blue-400',
                        'elite' => 'text-red-400',
                        'black ops' => 'text-yellow-400',
                        default => 'text-lime-400',
                    };
                @endphp

                <div class="bg-[#111111] rounded-3xl overflow-hidden border border-lime-400/30 hover:border-lime-400 hover:-translate-y-2 transition duration-300 shadow-lg shadow-lime-500/10 hover:shadow-lime-500/30">

                    <div class="relative">

                        @if($formula->image)
                            <img
                                src="{{ asset($formula->image) }}"
                                alt="{{ $formula->name }}"
                                class="w-full h-48 object-cover">
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>

                    </div>

                    <div class="p-5">

                        <h3 class="text-2xl font-black text-white uppercase">
                            {{ $formula->name }}
                        </h3>

                        <div class="mt-3 text-gray-300 space-y-1 text-sm">

                            <div>
                                ⏱️ {{ $formula->duration }} min
                            </div>

                            <div>
                                👥 {{ $formula->min_players }}
                                à
                                {{ $formula->max_players }}
                                joueurs
                            </div>

                            @if($formula->description)
                                <div class="h-16 mt-3 text-gray-500 text-sm leading-relaxed">
                                    {{ $formula->description }}
                                </div>
                            @endif

                        </div>

                        <div class="mt-5 text-4xl font-black {{ $color }}">
                            {{ number_format($formula->price, 0, ',', ' ') }}€
                        </div>

                        <a href="/reserver"
                           class="mt-5 block text-center bg-lime-400 text-black font-bold py-3 rounded-xl hover:bg-lime-300 transition">

                            🔫 Réserver

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

<section id="terrains" class="bg-black py-24">

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-5xl font-black text-center text-white mb-16">
            Nos <span class="text-lime-400">Terrains</span>
        </h2>

        <div class="grid lg:grid-cols-2 gap-8">

            <div class="bg-[#111111] rounded-3xl overflow-hidden border border-lime-400/20 hover:border-lime-400 transition duration-300 shadow-lg shadow-lime-500/10">

                <img
                    src="{{ asset('images/terrains/village.jpg') }}"
                    alt="Terrain Village"
                    class="w-full h-72 object-cover">

                <div class="p-6">

                    <h3 class="text-3xl font-black text-white mb-4">
                        🏘️ Le Village
                    </h3>

                    <div class="flex flex-wrap gap-2 mb-5">

                        <span class="bg-lime-400/10 text-lime-400 px-3 py-1 rounded-full text-sm">
                            👥 4 à 20 joueurs
                        </span>

                        <span class="bg-lime-400/10 text-lime-400 px-3 py-1 rounded-full text-sm">
                            🎯 CQB
                        </span>

                        <span class="bg-lime-400/10 text-lime-400 px-3 py-1 rounded-full text-sm">
                            🏠 Bâtiments
                        </span>

                    </div>

                    <p class="text-gray-400 leading-relaxed">
                        Terrain urbain immersif avec bâtiments, ruelles et combats rapprochés.
                    </p>

                </div>

            </div>

            <div class="bg-[#111111] rounded-3xl overflow-hidden border border-blue-400/20 hover:border-blue-400 transition duration-300 shadow-lg shadow-blue-500/10">

                <img
                    src="{{ asset('images/terrains/marche.jpg') }}"
                    alt="Terrain Marché"
                    class="w-full h-72 object-cover">

                <div class="p-6">

                    <h3 class="text-3xl font-black text-white mb-4">
                        🏪 Le Marché
                    </h3>

                    <div class="flex flex-wrap gap-2 mb-5">

                        <span class="bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full text-sm">
                            👥 4 à 20 joueurs
                        </span>

                        <span class="bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full text-sm">
                            🎯 Tactique
                        </span>

                        <span class="bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full text-sm">
                            🚧 Couvertures
                        </span>

                    </div>

                    <p class="text-gray-400 leading-relaxed">
                        Progression tactique, embuscades et scénarios d'équipe.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<section id="galerie" class="bg-[#0A0A0A] py-24">

    @php
        $galleryImages = \App\Models\GalleryImage::where('is_active', true)
            ->orderBy('sort_order')
            ->take(8)
            ->get();
    @endphp

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-5xl font-black text-center text-white mb-16">
            Galerie <span class="text-lime-400">Blaster44</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            @forelse($galleryImages as $image)

                <div class="bg-[#111111] rounded-3xl overflow-hidden">

                    <img
                        src="{{ asset($image->image) }}"
                        alt="{{ $image->title }}"
                        class="w-full h-72 object-cover hover:scale-105 transition duration-500">

                </div>

            @empty

                <div class="col-span-4 text-center text-gray-400">
                    Aucune photo disponible.
                </div>

            @endforelse

        </div>

    </div>

</section>

<section id="reservation" class="bg-black py-24">

    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-5xl font-black text-white mb-6">
            Prêt pour la mission ?
        </h2>

        <p class="text-gray-400 mb-10 text-xl">
            Réservez votre créneau en quelques secondes.
        </p>

        <a href="/reserver"
           class="bg-lime-400 text-black font-bold px-10 py-5 rounded-2xl hover:scale-105 duration-300 shadow-2xl shadow-lime-400/30">

            🔫 Réserver maintenant

        </a>

    </div>

</section>
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

        <div class="grid lg:grid-cols-3 gap-8">

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
                <div class="bg-[#111111] rounded-3xl overflow-hidden border border-yellow-400/20 hover:border-yellow-400 transition duration-300 shadow-lg shadow-yellow-500/10">

    <img
        src="{{ asset('images/terrains/marche.jpg') }}"
        alt="Le Futoir"
        class="w-full h-72 object-cover">

    <div class="p-6">

        <h3 class="text-3xl font-black text-white mb-4">
            🪵 Le Futoir
        </h3>

        <div class="flex flex-wrap gap-2 mb-5">

            <span class="bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full text-sm">
                👥 4 à 20 joueurs
            </span>

            <span class="bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full text-sm">
                🎯 Découverte
            </span>

            <span class="bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full text-sm">
                🛡️ Jeunes joueurs
            </span>

        </div>

        <p class="text-gray-400 leading-relaxed">
            Terrain idéal pour découvrir le Gel Blaster en toute sécurité.
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

        <h2 class="text-5xl font-black text-center text-white mb-6">
            Galerie <span class="text-lime-400">Blaster44</span>
        </h2>

        <p class="text-center text-gray-400 max-w-2xl mx-auto mb-10">
            Découvrez nos terrains, notre matériel et l'ambiance de nos parties.
        </p>

        {{-- Filtres --}}
        <div class="flex flex-wrap justify-center gap-3 mb-12">

            <button
                type="button"
                data-gallery-filter="all"
                class="gallery-filter active rounded-full border border-lime-400 bg-lime-400 px-5 py-2.5 font-bold text-black transition"
            >
                Toutes
            </button>

            <button
                type="button"
                data-gallery-filter="terrain"
                class="gallery-filter rounded-full border border-lime-400/50 px-5 py-2.5 font-bold text-lime-400 transition hover:bg-lime-400 hover:text-black"
            >
                🏕️ Terrains
            </button>

            <button
                type="button"
                data-gallery-filter="materiel"
                class="gallery-filter rounded-full border border-lime-400/50 px-5 py-2.5 font-bold text-lime-400 transition hover:bg-lime-400 hover:text-black"
            >
                🔫 Matériel
            </button>

            <button
                type="button"
                data-gallery-filter="jeux"
                class="gallery-filter rounded-full border border-lime-400/50 px-5 py-2.5 font-bold text-lime-400 transition hover:bg-lime-400 hover:text-black"
            >
                🎯 Jeux
            </button>

            <button
                type="button"
                data-gallery-filter="infrastructure"
                class="gallery-filter rounded-full border border-lime-400/50 px-5 py-2.5 font-bold text-lime-400 transition hover:bg-lime-400 hover:text-black"
            >
                🏢 Infrastructure
            </button>

        </div>

        {{-- Galerie --}}
        <div
            id="gallery-grid"
            class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6"
        >

            @forelse($galleryImages as $image)

                <button
                    type="button"
                    class="gallery-item group relative bg-[#111111] rounded-3xl overflow-hidden text-left"
                    data-category="{{ $image->category }}"
                    data-title="{{ $image->title }}"
                    data-description="{{ $image->description }}"
                    data-image="{{ asset($image->image) }}"
                >

                    <img
                        src="{{ asset($image->image) }}"
                        alt="{{ $image->title }}"
                        class="w-full h-72 object-cover transition duration-500 group-hover:scale-105"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-5 translate-y-3 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition duration-300">
                        <p class="text-white font-black text-lg">
                            {{ $image->title }}
                        </p>

                        @if($image->description)
                            <p class="text-gray-300 text-sm mt-1">
                                {{ $image->description }}
                            </p>
                        @endif
                    </div>

                    <div class="absolute top-4 right-4 rounded-full bg-black/60 px-3 py-2 text-white opacity-0 group-hover:opacity-100 transition">
                        🔍
                    </div>

                </button>

            @empty

                <div class="col-span-full text-center text-gray-400 py-12">
                    Aucune photo disponible.
                </div>

            @endforelse

        </div>

    </div>

    {{-- Lightbox --}}
    <div
        id="gallery-lightbox"
        class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/95 p-4"
    >

        <button
            type="button"
            id="gallery-close"
            class="absolute top-5 right-5 z-10 h-12 w-12 rounded-full bg-white/10 text-2xl text-white hover:bg-lime-400 hover:text-black transition"
            aria-label="Fermer"
        >
            ✕
        </button>

        <button
            type="button"
            id="gallery-prev"
            class="absolute left-3 md:left-8 z-10 h-12 w-12 rounded-full bg-white/10 text-2xl text-white hover:bg-lime-400 hover:text-black transition"
            aria-label="Photo précédente"
        >
            ‹
        </button>

        <div class="max-w-6xl w-full flex flex-col items-center">

            <img
                id="gallery-lightbox-image"
                src=""
                alt=""
                class="max-h-[75vh] max-w-full object-contain rounded-2xl shadow-2xl"
            >

            <div class="text-center mt-5 max-w-3xl">
                <h3
                    id="gallery-lightbox-title"
                    class="text-2xl font-black text-white"
                ></h3>

                <p
                    id="gallery-lightbox-description"
                    class="text-gray-400 mt-2"
                ></p>
            </div>

        </div>

        <button
            type="button"
            id="gallery-next"
            class="absolute right-3 md:right-8 z-10 h-12 w-12 rounded-full bg-white/10 text-2xl text-white hover:bg-lime-400 hover:text-black transition"
            aria-label="Photo suivante"
        >
            ›
        </button>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const items = Array.from(document.querySelectorAll('.gallery-item'));
    const filters = Array.from(document.querySelectorAll('.gallery-filter'));

    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxImage = document.getElementById('gallery-lightbox-image');
    const lightboxTitle = document.getElementById('gallery-lightbox-title');
    const lightboxDescription = document.getElementById('gallery-lightbox-description');

    const closeButton = document.getElementById('gallery-close');
    const prevButton = document.getElementById('gallery-prev');
    const nextButton = document.getElementById('gallery-next');

    let visibleItems = [...items];
    let currentIndex = 0;

    function updateLightbox() {

        if (!visibleItems.length) {
            return;
        }

        const item = visibleItems[currentIndex];

        lightboxImage.src = item.dataset.image;
        lightboxImage.alt = item.dataset.title || '';

        lightboxTitle.textContent = item.dataset.title || '';

        lightboxDescription.textContent =
            item.dataset.description || '';

        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');

        document.body.classList.add('overflow-hidden');
    }

    function closeLightbox() {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');

        document.body.classList.remove('overflow-hidden');
    }

    function showPrevious() {

        if (!visibleItems.length) {
            return;
        }

        currentIndex =
            (currentIndex - 1 + visibleItems.length) %
            visibleItems.length;

        updateLightbox();
    }

    function showNext() {

        if (!visibleItems.length) {
            return;
        }

        currentIndex =
            (currentIndex + 1) %
            visibleItems.length;

        updateLightbox();
    }

    items.forEach(item => {

        item.addEventListener('click', () => {

            visibleItems = items.filter(
                galleryItem => !galleryItem.classList.contains('hidden')
            );

            currentIndex = visibleItems.indexOf(item);

            updateLightbox();
        });

    });

    filters.forEach(filter => {

        filter.addEventListener('click', () => {

            const category = filter.dataset.galleryFilter;

            filters.forEach(button => {
                button.classList.remove('active', 'bg-lime-400', 'text-black');
                button.classList.add('text-lime-400');
            });

            filter.classList.add('active', 'bg-lime-400', 'text-black');
            filter.classList.remove('text-lime-400');

            items.forEach(item => {

                if (
                    category === 'all' ||
                    item.dataset.category === category
                ) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }

            });

            visibleItems = items.filter(
                item => !item.classList.contains('hidden')
            );

        });

    });

    closeButton.addEventListener('click', closeLightbox);
    prevButton.addEventListener('click', showPrevious);
    nextButton.addEventListener('click', showNext);

    lightbox.addEventListener('click', event => {

        if (event.target === lightbox) {
            closeLightbox();
        }

    });

    document.addEventListener('keydown', event => {

        if (lightbox.classList.contains('hidden')) {
            return;
        }

        if (event.key === 'Escape') {
            closeLightbox();
        }

        if (event.key === 'ArrowLeft') {
            showPrevious();
        }

        if (event.key === 'ArrowRight') {
            showNext();
        }

    });

});
</script>

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
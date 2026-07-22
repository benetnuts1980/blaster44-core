<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une partie - Blaster44</title>

    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#0A0A0A] text-white">
    <div class="relative max-w-3xl mx-auto py-12 px-6">

<div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute w-[700px] h-[700px] bg-lime-400/10 blur-[200px] rounded-full left-1/2 top-20 -translate-x-1/2"></div>
</div>

<div class="mb-10 mt-32">

    <h1 class="text-4xl md:text-5xl font-black uppercase">
        Réserver votre
        <span class="text-lime-400">
            mission
        </span>
    </h1>

    <p class="text-gray-400 mt-3">
        Choisissez votre formule, votre date et votre créneau.
    </p>

</div>

</div>

    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-600 text-white p-4 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-[#111111] text-white rounded-3xl border border-lime-400/20 p-8 shadow-2xl shadow-lime-500/10">

@auth
<div class="mb-6 p-4 bg-lime-400/10 border border-lime-400/20 rounded-xl">

    <div class="font-bold text-lime-400">
        🔫 Connecté en tant que
    </div>

    <div class="mt-1">
        {{ auth()->user()->pseudo ?? auth()->user()->name }}
    </div>

    <div class="text-sm text-gray-400">
        {{ auth()->user()->email }}
    </div>

</div>
@endauth

        <form method="POST" action="/reserver" class="space-y-6">
            @csrf

            @auth

<div class="bg-lime-400/10 border border-lime-400/20 rounded-2xl p-5">

    <div class="text-lime-400 font-bold text-lg mb-3">
        🔫 Joueur connecté
    </div>

    <div class="space-y-2">

        <div>
            <span class="text-gray-400">Pseudo :</span>
            {{ auth()->user()->pseudo ?? auth()->user()->name }}
        </div>

        <div>
            <span class="text-gray-400">Nom :</span>
            {{ auth()->user()->name }}
        </div>

        <div>
            <span class="text-gray-400">Email :</span>
            {{ auth()->user()->email }}
        </div>

        <div>
            <span class="text-gray-400">Téléphone :</span>
            {{ auth()->user()->phone ?? 'Non renseigné' }}
        </div>

    </div>

</div>

@endauth

@guest

<div>
    <label class="block mb-2 font-semibold">Nom</label>

    <input
        type="text"
        name="customer_name"
        value="{{ old('customer_name') }}"
        class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white"
        required
    >
</div>

<div>
    <label class="block mb-2 font-semibold">Téléphone</label>

    <input
        type="text"
        name="customer_phone"
        value="{{ old('customer_phone') }}"
        class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white"
        required
    >
</div>

<div>
    <label class="block mb-2 font-semibold">Email</label>

    <input
        type="email"
        name="customer_email"
        value="{{ old('customer_email') }}"
        class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white"
    >
</div>

@endguest
            <div>
                <label class="block mb-2 font-semibold">Formule</label>

                <select
                    name="formula_id"
                    class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white"
style="color:white;"
                    required
                >
                    <option value="">Choisir une formule</option>

                    @foreach($formulas as $formula)
                        <option
    value="{{ $formula->id }}"
    data-price="{{ $formula->price }}"
    data-duration="{{ $formula->duration }}"
    data-min="{{ $formula->min_players }}"
    data-max="{{ $formula->max_players }}"
>
                            {{ $formula->name }}
                            - {{ $formula->duration }} min
                            - {{ number_format($formula->price, 2, ',', ' ') }} €
                        </option>
                    @endforeach
                </select>
                <div
    id="formula-info"
    class="mt-4 p-4 bg-lime-50 border border-lime-200 rounded-lg hidden"
>
    <div class="font-bold text-lg text-lime-700">
        Informations de la formule
    </div>

    <div id="formula-price" class="mt-2"></div>
    <div id="formula-duration"></div>
    <div id="formula-players"></div>
</div>
            </div>
           <div class="bg-lime-400/10 border border-lime-400/20 rounded-2xl p-4">

    <div class="text-gray-400 text-sm">
        Prix estimé
    </div>

    <div
        id="price-display"
        class="text-4xl font-black text-lime-400 mt-1"
    >
        —
    </div>

</div>

            <div>
                <label class="block mb-2 font-semibold">Terrain</label>

                <select
    id="terrain"
    name="terrain_id"
                    class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white"
                    required
                >
                    <option value="">Choisir un terrain</option>

                    @foreach($terrains as $terrain)
                        <option value="{{ $terrain->id }}">
                            {{ $terrain->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Date</label>

                <input
    type="date"
class="w-full bg-[#1a1a1a] border border-gray-700 rounded-xl px-4 py-3 text-white"
    id="reservation_date"
    name="reservation_date"
    min="{{ now()->format('Y-m-d') }}"
                    value="{{ old('reservation_date') }}"
                    class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white"
                    required
                >
                <style>
input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(1);
}
</style>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Heure</label>

                <select
    id="start_time"
    name="start_time"
    class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white"
    required
>
    <option value="">Choisir une heure</option>

    <option value="09:00">09:00</option>
    <option value="10:00">10:00</option>
    <option value="11:00">11:00</option>
    <option value="12:00">12:00</option>
    <option value="13:00">13:00</option>
    <option value="14:00">14:00</option>
    <option value="15:00">15:00</option>
    <option value="16:00">16:00</option>
    <option value="17:00">17:00</option>
    <option value="18:00">18:00</option>
</select>

            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Nombre de joueurs
                </label>

                <input
    type="number"
    name="players_count"
    value="{{ old('players_count') }}"
    class="w-full bg-black border border-gray-700 rounded-xl px-4 py-3 text-white"
    min="1"
    max="12"
    required
>
<p class="text-sm text-gray-500 mt-1">
    Maximum 12 joueurs actuellement.
</p>
            </div>

            <button
                type="submit"
                class="w-full bg-lime-400 hover:bg-lime-300 text-black font-black py-4 rounded-2xl transition duration-300 hover:scale-[1.02]"
            >
                Réserver
            </button>
            <div class="text-center mt-6">

    <a
        href="/"
        class="text-gray-400 hover:text-lime-400 transition"
    >
        ← Retour à l'accueil
    </a>

</div>

        </form>

    </div>

</div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {

    const formula = document.querySelector('[name="formula_id"]');
    const priceDisplay = document.getElementById('price-display');

    formula.addEventListener('change', () => {

        const option = formula.options[formula.selectedIndex];
        const price = option.dataset.price;

        if (price) {
            priceDisplay.innerHTML = price + ' €';
        } else {
            priceDisplay.innerHTML = '—';
        }
    });

    const terrain = document.getElementById('terrain');
    const date = document.getElementById('reservation_date');
    const startTime = document.getElementById('start_time');

    async function loadAvailableSlots() {

        if (!terrain.value || !date.value) {
            return;
        }

        const response = await fetch(
            `/creneaux-disponibles?terrain_id=${terrain.value}&date=${date.value}`
        );

        const data = await response.json();

        startTime.innerHTML =
            '<option value="">Choisir une heure</option>';

        data.available.forEach(hour => {

            const option = document.createElement('option');

            option.value = hour;
            option.textContent = hour;

            startTime.appendChild(option);

        });
    }

    terrain.addEventListener('change', loadAvailableSlots);
    date.addEventListener('change', loadAvailableSlots);

});
</script>

</body>
<style>
select option {
    color: black;
}
</style>
</html>
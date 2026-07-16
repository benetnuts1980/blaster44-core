<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une partie - Blaster44</title>

    @vite(['resources/css/app.css'])
</head>
<body class="bg-black text-white">

<div class="max-w-4xl mx-auto py-10 px-4">

    <h1 class="text-5xl font-bold mb-8 text-lime-400">
        Réserver une partie
    </h1>

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

    <div class="bg-white text-black rounded-xl shadow p-6">

        <form method="POST" action="/reserver" class="space-y-6">
            @csrf

            <div>
                <label class="block mb-2 font-semibold">Nom</label>
                <input
                    type="text"
                    name="customer_name"
                    value="{{ old('customer_name') }}"
                    class="w-full border rounded-lg px-4 py-2"
                    required
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold">Téléphone</label>
                <input
                    type="text"
                    name="customer_phone"
                    value="{{ old('customer_phone') }}"
                    class="w-full border rounded-lg px-4 py-2"
                    required
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold">Email</label>
                <input
                    type="email"
                    name="customer_email"
                    value="{{ old('customer_email') }}"
                    class="w-full border rounded-lg px-4 py-2"
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold">Formule</label>

                <select
                    name="formula_id"
                    class="w-full border rounded-lg px-4 py-2"
                    required
                >
                    <option value="">Choisir une formule</option>

                    @foreach($formulas as $formula)
                        <option value="{{ $formula->id }}">
                            {{ $formula->name }}
                            - {{ $formula->duration }} min
                            - {{ number_format($formula->price, 2, ',', ' ') }} €
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Terrain</label>

                <select
                    name="terrain_id"
                    class="w-full border rounded-lg px-4 py-2"
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
                    name="reservation_date"
                    value="{{ old('reservation_date') }}"
                    class="w-full border rounded-lg px-4 py-2"
                    required
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold">Heure</label>

                <input
                    type="time"
                    name="start_time"
                    value="{{ old('start_time') }}"
                    class="w-full border rounded-lg px-4 py-2"
                    required
                >
            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Nombre de joueurs
                </label>

                <input
                    type="number"
                    name="players_count"
                    value="{{ old('players_count') }}"
                    class="w-full border rounded-lg px-4 py-2"
                    min="1"
                    required
                >
            </div>

            <button
                type="submit"
                class="bg-lime-500 hover:bg-lime-600 text-white px-6 py-3 rounded-lg"
            >
                Réserver
            </button>

        </form>

    </div>

</div>

</body>
</html>
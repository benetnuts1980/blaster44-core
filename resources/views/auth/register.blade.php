<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
<div class="text-center mb-6">

    <h2 class="text-2xl font-black text-lime-400">
        👤 Créer un compte
    </h2>

    <p class="text-gray-400 text-sm mt-2">
        Rejoignez la communauté Blaster44 et cumulez des points à chaque partie.
    </p>

</div>
<div>
    <x-input-label for="pseudo" value="Pseudo" />

    <x-text-input
        id="pseudo"
        class="block mt-1 w-full"
        type="text"
        name="pseudo"
        :value="old('pseudo')"
        required
    />

    <x-input-error :messages="$errors->get('pseudo')" class="mt-2" />
</div>

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nom complet" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
    <x-input-label for="phone" value="Téléphone" />

    <x-text-input
        id="phone"
        class="block mt-1 w-full"
        type="text"
        name="phone"
        :value="old('phone')"
    />

    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
</div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" value="Adresse e-mail" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Mot de passe" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmer le mot de passe" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                Déjà inscrit ?
            </a>

            <x-primary-button class="ms-4">
                Créer mon compte
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<x-guest-layout>

    <div class="mb-6 text-center">

        <h2 class="text-2xl font-black text-lime-400 mb-2">
            🔑 Mot de passe oublié
        </h2>

        <p class="text-gray-400 text-sm">
            Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </p>

    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="'Adresse e-mail'" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">

            <x-primary-button>
                📧 Envoyer le lien de réinitialisation
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>
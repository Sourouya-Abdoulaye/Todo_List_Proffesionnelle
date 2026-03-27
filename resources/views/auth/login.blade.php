<div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="w-full max-w-md bg-white dark:bg-gray-800 
                p-8 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700">

        <!-- Status -->
        <x-auth-session-status class="mb-4 text-green-600 text-sm text-center" :status="session('status')" />

        <!-- Title -->
        <h2 class="text-2xl font-semibold text-center text-gray-800 dark:text-white mb-1">
            Bon retour 👋
        </h2>
        <p class="text-center text-sm text-gray-500 dark:text-gray-400 mb-6">
            Connecte-toi pour continuer
        </p>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-600 dark:text-gray-300 text-sm"/>
                <x-text-input 
                    id="email"
                    class="block mt-1 w-full px-4 py-2.5 rounded-lg border border-gray-300 
                           focus:ring-2 focus:ring-green-500 focus:border-green-500 
                           dark:bg-gray-700 dark:border-gray-600"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-xs" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-600 dark:text-gray-300 text-sm"/>
                <x-text-input 
                    id="password"
                    class="block mt-1 w-full px-4 py-2.5 rounded-lg border border-gray-300 
                           focus:ring-2 focus:ring-green-500 focus:border-green-500
                           dark:bg-gray-700 dark:border-gray-600"
                    type="password"
                    name="password"
                    required
                />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-xs" />
            </div>

            <!-- Options -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                    <input type="checkbox" 
                        class="rounded border-gray-300 text-green-600 focus:ring-green-500"
                        name="remember">
                    Remember me
                </label>

                <a href="{{ route('password.request') }}"
                   class="text-gray-500 hover:text-green-600 transition">
                    Mot de passe oublié ?
                </a>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 
                       text-white font-medium py-2.5 rounded-lg 
                       shadow-md hover:shadow-lg transition duration-300">
                Se connecter
            </button>

            <!-- Register -->
            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-4">
                Pas de compte ?
                <a href="/register" class="text-green-600 hover:underline font-medium">
                    Créer un compte
                </a>
            </p>

        </form>
    </div>
</div>
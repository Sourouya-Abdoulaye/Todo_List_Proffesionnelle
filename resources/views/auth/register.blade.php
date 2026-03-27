<div class="flex items-center justify-center min-h-screen bg-gray-50 dark:bg-gray-900 px-4">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Créer un compte</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">
                Commence ton organisation dès maintenant
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-sm text-gray-600 dark:text-gray-300"/>
                <x-text-input id="name"
                    class="block mt-1 w-full px-3 py-2 rounded-lg border border-gray-300 
                           bg-white text-gray-800 placeholder-gray-400
                           focus:ring-2 focus:ring-green-500 focus:border-green-500
                           dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    type="text" name="name" :value="old('name')" placeholder="John Doe" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-500" />
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-sm text-gray-600 dark:text-gray-300"/>
                <x-text-input id="email"
                    class="block mt-1 w-full px-3 py-2 rounded-lg border border-gray-300 
                           bg-white text-gray-800 placeholder-gray-400
                           focus:ring-2 focus:ring-green-500 focus:border-green-500
                           dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    type="email" name="email" :value="old('email')" placeholder="john@example.com" required />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-sm text-gray-600 dark:text-gray-300"/>
                <x-text-input id="password"
                    class="block mt-1 w-full px-3 py-2 rounded-lg border border-gray-300 
                           bg-white text-gray-800 placeholder-gray-400
                           focus:ring-2 focus:ring-green-500 focus:border-green-500
                           dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    type="password" name="password" placeholder="••••••••" required />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm text-gray-600 dark:text-gray-300"/>
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full px-3 py-2 rounded-lg border border-gray-300 
                           bg-white text-gray-800 placeholder-gray-400
                           focus:ring-2 focus:ring-green-500 focus:border-green-500
                           dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    type="password" name="password_confirmation" placeholder="••••••••" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
            </div>

            <!-- Actions -->
            <div class="flex flex-col gap-3 mt-4">
                <a href="{{ route('login') }}"
                   class="text-sm text-gray-500 hover:text-green-600 text-center transition">
                    Déjà inscrit ? Connecte-toi
                </a>

                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 rounded-lg 
                           shadow-sm hover:shadow-md transition duration-200">
                    S'inscrire
                </button>
            </div>

        </form>
    </div>
</div>
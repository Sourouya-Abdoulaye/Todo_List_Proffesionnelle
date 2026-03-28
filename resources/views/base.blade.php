<!DOCTYPE html>
<html lang="fr" class="bg-gray-50 dark:bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-800 dark:text-gray-200 transition-colors duration-300">

    <!-- Navbar -->
    <nav class="bg-green-700 dark:bg-gray-800 text-white shadow-md px-4 md:px-8 py-3 md:flex md:justify-between md:items-center mb-[50px]">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2 font-bold text-lg md:text-xl text-green-200 dark:text-green-400">
                <span class="text-2xl">📝</span>
                TodoList
            </a>
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                ☰
            </button>
        </div>

        <!-- Menu -->
        <div id="mobile-menu" class="hidden md:flex flex-col md:flex-row md:items-center md:gap-4 mt-3 md:mt-0">
            @auth
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('dashboard') }}" class="px-3 py-1 rounded hover:bg-green-600 dark:hover:bg-gray-700 transition">Dashboard</a>
            @endif
            @endauth

            <a href="{{ route('liste.task')}}" class="px-3 py-1 rounded hover:bg-green-600 dark:hover:bg-gray-700 transition">Toutes</a>
            <a href="{{ route('liste.task',['status'=>0])}}" class="px-3 py-1 rounded hover:bg-green-600 dark:hover:bg-gray-700 transition">En cours</a>
            <a href="{{ route('liste.task',['status'=>1])}}" class="px-3 py-1 rounded hover:bg-green-600 dark:hover:bg-gray-700 transition">Terminées</a>


            @auth
            <form action="/logout" method="POST" class="mt-2 md:mt-0">
                @csrf
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">
                    Se Déconnecter
                </button>
            </form>
            @endauth

            @guest
            <a href="/login" class="px-3 py-1 rounded hover:bg-green-600 dark:hover:bg-gray-700 transition mt-2 md:mt-0">Se connecter</a>
            @endguest

            <div class="flex gap-5 items-center text-white">

                <button id="dark-toggle" class="ml-4 px-3 py-1 rounded bg-white text-green-500 dark:bg-gray-700 dark:text-white transition">
                    🌙
                </button>
            </div>
        </div>
    </nav>

    @yield('search_bare')

    <div class="max-w-full mx-auto px-4">
        @yield('remplire')
    </div>

    <script>
        // Dark mode toggle
        document.addEventListener('DOMContentLoaded', () => {
            const toggleBtn = document.getElementById('dark-toggle');
            toggleBtn.addEventListener('click', () => {
                document.documentElement.classList.toggle('dark');

                // Changer le texte du bouton si tu veux
                if (document.documentElement.classList.contains('dark')) {
                    toggleBtn.textContent = '☀️ ';
                } else {
                    toggleBtn.textContent = '🌙 ';
                }
            });
        });

        // Mobile menu toggle
        const menuBtn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
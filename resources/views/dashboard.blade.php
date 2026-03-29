<x-app-layout>
  <div class="flex flex-col md:flex-row min-h-screen bg-gray-50 dark:bg-gray-900 font-sans">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-full md:w-60 bg-green-700 text-white flex flex-col p-5 shadow-lg hidden md:flex">
      <div class="text-3xl font-bold mb-6 border-b border-green-600 pb-3">MonApp</div>

      <!-- Menu -->
      <nav class="flex-1 flex flex-col gap-3">
        <a href="{{ route('dashboard')}}" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-green-600 transition">
          <span>👤</span>
          <span>Statistique</span>
        </a>

        <!-- <a href="/" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-green-600 transition">
          <span>🏠</span>
          <span>Tâches</span>
        </a> -->

        <a href="/admin/tasks" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-green-600 transition">
          <span>🏠</span>
          <span>Mes tâches</span>
        </a>

        <a href="{{ route('admin.users')}}" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-green-600 transition">
          <span>👤</span>
          <span>Users</span>
        </a>

        
        <!-- <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-green-600 transition">
          <span>👤</span>
          <span>Profil</span>
        </a> -->
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-green-600 transition">
          <span>⚙️</span>
          <span>Paramètres</span>
        </a>
      </nav>

      <!-- Footer -->
      <div class="mt-auto border-t border-green-600 pt-3">
        <a href="#" class="flex items-center gap-3 hover:text-gray-200 transition">
          <span>🚪</span>
          <span>Déconnexion</span>
        </a>
      </div>
    </aside>

    <!-- Mobile Sidebar toggle -->
    <div class="md:hidden flex items-center justify-between bg-green-700 text-white p-4">
      <div class="text-2xl font-bold">MonApp</div>
      <button id="toggle-sidebar" class="p-2 bg-green-600 rounded-md text-white">☰</button>
    </div>

    <!-- Contenu -->
    <main class="flex-1 p-4 md:p-8 min-w-0">
      <div>
           @yield('search_bare')
      </div>
     <div>
        @yield('contenu')
     </div>
      
      
    </main>
  </div>

  <script>
    // Toggle sidebar on mobile
    const toggleBtn = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('sidebar');
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('hidden');
    });



    //ce que j'ai ajouter
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
        // const menuBtn = document.getElementById('mobile-menu-button');
        // const menu = document.getElementById('mobile-menu');
        // menuBtn.addEventListener('click', () => {
        //     menu.classList.toggle('hidden');
        // });
    
  </script>
</x-app-layout>

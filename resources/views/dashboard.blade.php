<x-app-layout>
  <div class="flex flex-col md:flex-row min-h-screen bg-gray-50 dark:bg-gray-900 font-sans">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-full md:w-60 bg-green-700 text-white flex flex-col p-5 shadow-lg hidden md:flex">
      <div class="text-3xl font-bold mb-6 border-b border-green-600 pb-3">MonApp</div>

      <!-- Menu -->
      <nav class="flex-1 flex flex-col gap-3">
        <a href="/" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-green-600 transition">
          <span>🏠</span>
          <span>Tâches</span>
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded-md hover:bg-green-600 transition">
          <span>👤</span>
          <span>Profil</span>
        </a>
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
      <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Dashboard</h1>
        <!-- <p class="mb-6 text-gray-700 dark:text-gray-300">{{ __("You're logged in!") }}</p> -->

        <div class="overflow-x-auto w-full">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-green-700 text-white">
              <tr>
                <th class="px-4 py-3 text-left text-sm font-semibold">ID</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Name</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Email</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Role</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Created At</th>
                <th class="px-4 py-3 text-left text-sm font-semibold">Updated At</th>
                <th class="px-4 py-3 text-center text-sm font-semibold">Actions</th>
              </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
              @foreach($users as $user)
                <tr class="hover:bg-green-100 dark:hover:bg-green-600 transition">
                  <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">{{$user->id}}</td>
                  <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">{{$user->name}}</td>
                  <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">{{$user->email}}</td>
                  <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-200">{{$user->role}}</td>
                  <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-300">{{$user->created_at}}</td>
                  <td class="px-4 py-2 text-sm text-gray-500 dark:text-gray-300">{{$user->updated_at}}</td>
                  <td class="px-4 py-2 flex justify-between gap-2  ">

                    <a href="/users/{{$user->id}}/show"
                       class="flex items-center gap-1 px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-sm transition">
                       👁️ Show
                    </a>

                    <a href="/users/{{$user->id}}/edit"
                       onclick="return confirm('Voulez vous modifier cet utilisateur ?');"
                       class="flex items-center gap-1 px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-sm transition">
                       ✏️ Update
                    </a>

                    <form action="/users/{{$user->id}}/delete" method="POST"
                          onsubmit="return confirm('Supprimer cet utilisateur ?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                              class="flex items-center gap-1 px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm transition">
                        🗑️ Delete
                      </button>
                    </form>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
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
  </script>
</x-app-layout>
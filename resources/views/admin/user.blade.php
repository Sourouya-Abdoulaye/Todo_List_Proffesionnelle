@extends('dashboard')

@section('search_bare')
<div class="max-w-4xl mx-auto mb-6 px-4">
    <input
        type="text"
        id="tache_search"
        placeholder="Rechercher une tâche..."
        class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none
        focus:ring-2 focus:ring-green-400 dark:bg-gray-800 dark:border-gray-700
        dark:placeholder-gray-400 dark:text-white transition">
</div>
@endsection


@section('contenu')
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

                        <!-- <a href="/users/{{$user->id}}/edit"
                       onclick="return confirm('Voulez vous modifier cet utilisateur ?');"
                       class="flex items-center gap-1 px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-sm transition">
                       ✏️ Update
                    </a> -->

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
@endsection
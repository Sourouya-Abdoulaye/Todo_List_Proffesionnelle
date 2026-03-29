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
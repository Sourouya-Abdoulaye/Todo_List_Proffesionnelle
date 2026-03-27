@extends('base')

@section('remplire')
<div class="max-w-md mx-auto mt-12 bg-white p-8 rounded-lg shadow-lg">

    <h2 class="text-2xl font-bold text-green-600 text-center mb-6">Créer une tâche</h2>

    <form method="POST" action="/store" class="space-y-5">
        @csrf

        @error('title')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div>
            <label for="title" class="block text-gray-900 font-semibold mb-2">Titre</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Entrer le titre..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 transition" required>
        </div>

        <div>
            <label for="status" class="block text-gray-900 font-semibold mb-2">Statut</label>
            <select name="status" id="status"
                class="w-full px-4 py-2 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 transition">
                <option value="0">En attente</option>
                <option value="1">Terminé</option>
            </select>
        </div>

        <button type="submit"
            class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md transition">
            Créer la tâche
        </button>
    </form>

</div>
@endsection
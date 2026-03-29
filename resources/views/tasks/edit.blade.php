@extends('base')

@section('contenu')
<div class="max-w-md mx-auto mt-12 bg-white p-8 rounded-lg shadow-lg">

    <h2 class="text-2xl font-bold text-green-600 text-center mb-6">Modifier la tâche</h2>

    <form method="POST" action="{{ route('update.task', $task->id) }}" class="space-y-5">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $task->id }}">

        @error('title')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <div>
            <label for="title" class="block text-gray-900 font-semibold mb-2">Titre</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 transition">
        </div>

        <div>
            <label for="status" class="block text-gray-900 font-semibold mb-2">Statut</label>
            <select name="status" id="status"
                class="w-full px-4 py-2 border border-gray-300 rounded-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 transition">
                <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>En attente</option>
                <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Terminé</option>
            </select>
        </div>

        <button type="submit"
            class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md transition">
            Mettre à jour
        </button>
    </form>

</div>
@endsection
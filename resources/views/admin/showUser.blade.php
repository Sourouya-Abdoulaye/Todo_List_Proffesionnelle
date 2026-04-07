@extends('dashboard')
@section('title', $title)
@section('contenu')
<div class="px-4 py-4">

    <!-- Informations personnelles -->
    <div class="bg-white rounded-2xl px-6 py-6 m-4 shadow">
        <p class="text-2xl font-semibold text-center mb-6">Information Personnelle</p>

        <div class="space-y-2 text-lg">
            <p><strong class="text-blue-800">Name:</strong> {{ $user->name }}</p>
            <p><strong class="text-blue-800">Email:</strong> {{ $user->email }}</p>
            <p><strong class="text-blue-800">Role:</strong> {{ $user->role }}</p>
            <p><strong class="text-blue-800">Date de Creation:</strong> {{ $user->created_at }}</p>
            <p><strong class="text-blue-800">Birth Day:</strong> {{ $user->updated_at }}</p>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="bg-white rounded-2xl px-6 py-6 m-4 shadow">
        <h2 class="text-2xl font-semibold text-center mb-6">Statistique De L'utilisateur</h2>

        <div class="flex flex-wrap justify-center gap-6">

            <div class="flex flex-col items-center justify-center rounded-xl bg-blue-500 shadow-xl w-64 hover:bg-blue-600 transition h-[150px]">
                <strong class="text-white text-xl text-center">Tache Total</strong>
                <span class="text-3xl text-white mt-2">{{ $tasks->count() }}</span>
            </div>

            <div class="flex flex-col items-center justify-center rounded-xl bg-green-500 shadow-xl w-64 hover:bg-green-600 transition h-[150px]">
                <strong class="text-white text-xl text-center">Tache Terminer</strong>
                <span class="text-3xl text-white mt-2">{{ $tasks->where('status', 1)->count() }}</span>
            </div>

            <div class="flex flex-col items-center justify-center rounded-xl bg-orange-500 shadow-xl w-64 hover:bg-orange-600 transition h-[150px]">
                <strong class="text-white text-xl text-center">Tache En attente</strong>
                <span class="text-3xl text-white mt-2">{{ $tasks->where('status', 0)->count() }}</span>
            </div>

        </div>
    </div>

</div>
@endsection
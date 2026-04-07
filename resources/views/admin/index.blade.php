@extends('dashboard')

@section("contenu")
    <div class="flex flex-wrap  gap-6 w-full">

        <div
            class="flex flex-col items-center justify-center rounded-xl bg-blue-500 shadow-xl w-80 hover:bg-blue-600 transition h-[150px]">
            <strong class="text-white text-xl text-center">Nombres d'utilisateur</strong>
            <span class="text-3xl text-white mt-2">{{ $users->count() }}</span>
        </div>

        <div
            class="flex flex-col items-center justify-center rounded-xl bg-green-500 shadow-xl w-80 hover:bg-green-600 transition h-[150px]">
            <strong class="text-white text-xl text-center">Nombres de tache</strong>
            <span class="text-3xl text-white mt-2">{{ $tasks->count() }}</span>
        </div>

        <div
            class="flex flex-col items-center justify-center rounded-xl bg-orange-500 shadow-xl w-80 hover:bg-orange-600 transition h-[150px]">
            <strong class="text-white text-xl text-center">Nombres de tache en attente</strong>
            <span class="text-3xl text-white mt-2">{{ $tasks->where('status', 0)->count() }}</span>
        </div>

        <div
            class="flex flex-col items-center justify-center rounded-xl bg-blue-500 shadow-xl w-80 hover:bg-blue-600 transition h-[150px]">
            <strong class="text-white text-xl text-center">Nombres de taches terminer</strong>
            <span class="text-3xl text-white mt-2">{{ $tasks->where('status', 1)->count() }}</span>
        </div>


    </div>
@endsection
@extends('base')
@vite('resources/css/app.css')
@section('remplire')

<div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">

    <h2 class="text-2xl font-bold text-green-600 mb-6">Détail de la tâche</h2>

    <div class="mb-4">
        <span class="font-semibold text-gray-700">ID :</span>
        <span class="text-gray-800 ml-2">{{$contenu->id}}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-700">Title :</span>
        <span class="text-gray-800 ml-2">{{$contenu->title}}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-700">Status :</span>
        <span class="inline-block px-3 py-1 rounded-full text-white font-medium
            {{ $contenu->status == 1 ? 'bg-green-500' : 'bg-red-500' }} ml-2">
            {{ $contenu->status == 1 ? 'Terminé' : 'En cours' }}
        </span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-700">Created At :</span>
        <span class="text-gray-800 ml-2">{{$contenu->created_at}}</span>
    </div>

    <div class="mb-4">
        <span class="font-semibold text-gray-700">Updated At :</span>
        <span class="text-gray-800 ml-2">{{$contenu->updated_at}}</span>
    </div>

    <a href="{{ route('liste.task')}}" class="inline-block mt-4 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded transition">
        Retour
    </a>

</div>

@endsection
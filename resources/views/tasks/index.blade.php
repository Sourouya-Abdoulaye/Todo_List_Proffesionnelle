@extends('base')


<!-- Barre de recherche -->
@section('search_bare')
<div class="max-w-4xl mx-auto mb-6 px-4">
    <input 
        type="text" 
        id="tache_search" 
        placeholder="Rechercher une tâche..." 
        class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white transition"
    >
</div>
@endsection

<!-- Tableau -->
@section('remplire')
@if (session('success'))
<p class="text-green-600 font-semibold mb-4">
    {{ session('success') }}
</p>
@endif


<div class="overflow-x-auto max-w-full px-4"> 
<table class="min-w-full border border-gray-200 shadow-md rounded-lg overflow-hidden">
    <thead class="bg-green-500 text-white">
        <tr>
            <th class="p-3 text-left text-sm font-medium uppercase">ID</th>
            <th class="p-3 text-left text-sm font-medium uppercase">Title</th>
            <th class="p-3 text-left text-sm font-medium uppercase">Status</th>
            <th class="p-3 text-left text-sm font-medium uppercase">Created At</th>
            <th class="p-3 text-left text-sm font-medium uppercase">Updated At</th>
            <th class="p-3 text-left text-sm font-medium uppercase">Action</th>
        </tr>
    </thead>
    <tbody id="table-body" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
        @if (isset($_GET['status']) && in_array($_GET['status'],[0,1]))
            @foreach($contenu as $task)
                @if ($task->status == $_GET['status'])
                    <tr class="hover:bg-green-100 dark:hover:bg-green-700 transition">
                        <td class="p-3 text-sm">{{$task->id}}</td>
                        <td class="p-3 text-sm">{{$task->title}}</td>
                        <td class="p-3 text-sm font-semibold {{ $task->status == 1 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $task->status == 1 ? 'Terminé' : 'En cours...' }}
                        </td>
                        <td class="p-3 text-sm">{{$task->created_at}}</td>
                        <td class="p-3 text-sm">{{$task->updated_at}}</td>
                        <td class="p-3 flex flex-wrap gap-2">
                            <a href="/{{$task->id}}/show" class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded transition text-sm">Show</a>
                            <a href="/{{$task->id}}/edit" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded transition text-sm">Update</a>
                            <form action="/{{$task->id}}/delete" method="POST" onsubmit="return confirm('Supprimer cet élément ?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded transition text-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        @else
            @foreach($contenu as $task)
                <tr class="hover:bg-green-100 dark:hover:bg-green-700 transition">
                    <td class="p-3 text-sm">{{$task->id}}</td>
                    <td class="p-3 text-sm">{{$task->title}}</td>
                    <td class="p-3 text-sm font-semibold {{ $task->status == 1 ? 'text-green-600' : 'text-red-600' }}">
                        {{ $task->status == 1 ? 'Terminé' : 'En cours...' }}
                    </td>
                    <td class="p-3 text-sm">{{$task->created_at}}</td>
                    <td class="p-3 text-sm">{{$task->updated_at}}</td>
                    <td class="p-3 flex flex-wrap gap-2">
                        <a href="/{{$task->id}}/show" class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded transition text-sm">Show</a>
                        <a href="/{{$task->id}}/edit" onclick="return confirm('Voulez vous mettre à jour ?');" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded transition text-sm">Update</a>
                        <form action="/{{$task->id}}/delete" method="POST" onsubmit="return confirm('Supprimer cet élément ?');">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded transition text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
</div>

<!-- JS pour recherche dynamique -->
<script>
let search = document.getElementById('tache_search');
let tableBody = document.getElementById('table-body');

search.addEventListener('keyup', function() {
    let query = search.value;

    fetch(`/tasks/search?query=${query}`)
        .then(res => res.json())
        .then(data => {
            tableBody.innerHTML = '';
            if(data.length === 0){
                tableBody.innerHTML = '<tr><td colspan="6" class="text-center p-3">Aucune tâche trouvée</td></tr>';
            } else {
                data.forEach(task => {
                    tableBody.innerHTML += `
                        <tr class="hover:bg-green-100 dark:hover:bg-green-700 transition">
                            <td class="p-3 text-sm">${task.id}</td>
                            <td class="p-3 text-sm">${task.title}</td>
                            <td class="p-3 text-sm font-semibold ${task.status == 1 ? 'text-green-600' : 'text-red-600'}">${task.status == 1 ? 'Terminé' : 'En cours'}</td>
                            <td class="p-3 text-sm">${task.created_at}</td>
                            <td class="p-3 text-sm">${task.updated_at}</td>
                            <td class="p-3 flex flex-wrap gap-2">
                                <a href="${task.id}/show" class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded text-sm">Show</a>
                                <a href="${task.id}/edit" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-sm">Update</a>
                                <form action="/${task.id}/delete" method="POST" onsubmit="return confirm('Supprimer cet élément ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm">Delete</button>
                                </form>
                            </td>
                        </tr>`;
                });
            }
        });
});
</script>
@endsection
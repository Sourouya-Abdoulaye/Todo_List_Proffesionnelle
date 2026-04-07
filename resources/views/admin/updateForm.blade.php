<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <h1>Update User</h1>

<div class="flex justify-center">
    <div class="bg-blue-500 max-w-96 h-[500px] p-4 rounded-lg flex gap-12 justify-center ">
        <form action="/admin/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="m-6">
                <label for="name">Name:</label>
                <input class="p-2 w-full rounded-lg" type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="m-6">
                <label for="email">Email:</label>
                <input class="p-2 w-full rounded-lg" type="text" type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="m-6">
                <label for="role">Role:</label>
                <select class="p-2 w-full rounded-lg" id="role" name="role" required>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button class="bg-slate-800 text-white p-2 w-full rounded-lg" type="submit">Update User</button>
        </form>
    </div>
</div>
</body>
</html>
<!-- resources/views/auth/superadmin_login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Login</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Remela.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Super Admin Login</h2>
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">{{ $errors->first() }}</span>
            </div>
        @endif
            <form method="POST" action="{{ route('superadmin.login.post') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="text" name="email" id="email" class="block w-full border border-gray-300 rounded p-2 mt-1" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password:</label>
                    <input type="password" name="password" id="password" class="block w-full border border-gray-300 rounded p-2 mt-1" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

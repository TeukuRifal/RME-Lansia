<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">Role:</label>
                    <select name="role" id="role" class="block w-full border border-gray-300 rounded p-2 mt-1">
                        <option value="admin">Admin</option>
                        <option value="patient">Patient</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username:</label>
                    <input type="text" name="username" id="username" class="block w-full border border-gray-300 rounded p-2 mt-1" required>
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
    <script>
        const roleSelect = document.getElementById('role');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
    
        roleSelect.addEventListener('change', function() {
            if (roleSelect.value === 'patient') {
                // Jika role pasien dipilih, atur input username dengan nama lengkap
                usernameInput.placeholder = 'Nama Lengkap';
                // Atur input password dengan NIK
                passwordInput.placeholder = 'NIK';
            } else {
                // Jika role admin dipilih atau role lainnya, atur kembali input ke default
                usernameInput.placeholder = 'Username';
                passwordInput.placeholder = 'Password';
            }
        });
    </script>
</body>
</html>

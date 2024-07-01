<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #BDE0DF;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center ">
        <div class=" p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">Role:</label>
                    <select name="role" id="role" class="block w-full border border-gray-300 rounded p-2 mt-1">
                        <option value="patient">Patient</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700" id="username-label">Username:</label>
                    <input type="text" name="username" id="username"
                        class="block w-full border border-gray-300 rounded p-2 mt-1" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700" id="password-label">Password:</label>
                    <input type="password" name="password" id="password"
                        class="block w-full border border-gray-300 rounded p-2 mt-1" required>
                </div>
                <div class="flex items-center justify-between ">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
                </div>

            </form>
        </div>
    </div>
    <script>
        const roleSelect = document.getElementById('role');
        const usernameLabel = document.getElementById('username-label');
        const usernameInput = document.getElementById('username');
        const passwordLabel = document.getElementById('password-label');
        const passwordInput = document.getElementById('password');

        roleSelect.addEventListener('change', function() {
            if (roleSelect.value === 'patient') {
                usernameLabel.textContent = 'NIK';
                usernameInput.placeholder = 'NIK';
                passwordLabel.textContent = 'Password:';
                passwordInput.placeholder = 'Password';
            } else {
                usernameLabel.textContent = 'Email:';
                usernameInput.placeholder = 'Email';
                passwordLabel.textContent = 'Password:';
                passwordInput.placeholder = 'Password';
            }
        });
    </script>
</body>

</html>

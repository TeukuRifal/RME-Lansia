<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Remela.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url('{{ asset('images/bgremela.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen">
        <div class="relative p-8 bg-white rounded-lg shadow-lg w-full max-w-md">
            <h2 class="mb-6 text-3xl font-bold text-center">Masuk</h2>

            @if ($errors->any())
                <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                    <strong class="text-lg font-bold">Oops!</strong>
                    <span class="block sm:inline">{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-4">
                    <label for="role" class="block text-lg font-medium text-gray-700">
                        <i class="fas fa-user-circle mr-2"></i>Masuk Sebagai:
                    </label>
                    <select name="role" id="role" class="w-full px-4 py-2 mt-1 text-lg border border-gray-300 rounded">
                        <option value="patient">Klien</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="username" id="username-label" class="block text-lg font-medium text-gray-700">
                        <i class="fas fa-id-card mr-2"></i>NIK:
                    </label>
                    <input type="text" name="username" id="username" placeholder="NIK"
                        class="w-full px-4 py-2 mt-1 text-lg border border-gray-300 rounded" required>
                </div>

                <div class="relative mb-4">
                    <label for="password" id="password-label" class="block text-lg font-medium text-gray-700">
                        <i class="fas fa-lock mr-2"></i>Kata Sandi:
                    </label>
                    <input type="password" name="password" id="password" placeholder="Kata Sandi"
                        class="w-full px-4 py-2 mt-1 text-lg border border-gray-300 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" id="show-password" class="mr-2">
                        <span class="text-gray-700">Tampilkan Kata Sandi</span>
                    </label>
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="px-8 py-3 text-lg font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Masuk</button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <a href="/" class="text-lg font-bold text-blue-500 hover:underline">Kembali ke Beranda</a>
            </div>

            <a href="/superadmin/login" class="absolute text-gray-600 hover:text-gray-800 top-4 right-4">
                <i class="fas fa-user-shield text-2xl"></i>
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const usernameLabel = document.getElementById('username-label');
            const usernameInput = document.getElementById('username');
            const passwordLabel = document.getElementById('password-label');
            const passwordInput = document.getElementById('password');
            const showPasswordCheckbox = document.getElementById('show-password');

            roleSelect.addEventListener('change', function () {
                if (roleSelect.value === 'patient') {
                    usernameLabel.innerHTML = '<i class="fas fa-id-card mr-2"></i>NIK:';
                    usernameInput.placeholder = 'NIK';
                    passwordLabel.innerHTML = '<i class="fas fa-lock mr-2"></i>Password:';
                    passwordInput.placeholder = 'Password';
                } else {
                    usernameLabel.innerHTML = '<i class="fas fa-envelope mr-2"></i>Email:';
                    usernameInput.placeholder = 'Email';
                    passwordLabel.innerHTML = '<i class="fas fa-lock mr-2"></i>Password:';
                    passwordInput.placeholder = 'Password';
                }
            });

            showPasswordCheckbox.addEventListener('change', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
            });
        });
    </script>
</body>

</html>

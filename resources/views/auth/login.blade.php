<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Remela.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('images/bgremela.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        /* Custom Styles for Larger Text */
        .text-large {
            font-size: 2.5rem; /* 40px */
        }
        .text-medium {
            font-size: 1.5rem; /* 20px */
        }

        .input-large {
            font-size: 1.25rem; /* 20px */
            padding: 0.75rem; /* 12px */
        }

        .btn-large {
            font-size: 1.25rem; /* 20px */
            padding: 0.75rem 1.5rem; /* 12px 24px */
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="p-8 rounded-xl shadow-md w-full max-w-md bg-white">
            <h2 class="text-large font-bold mb-6 text-center">Masuk</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold text-lg">Oops!</strong>
                    <span class="block sm:inline text-lg">{{ $errors->first() }}</span>
                </div>
            @endif
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-medium">Masuk Sebagai:</label>
                    <select name="role" id="role"
                        class="block w-full border border-gray-300 rounded input-large mt-1">
                        <option value="patient">Lansia</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-medium" id="username-label">NIK:</label>
                    <input type="text" name="username" id="username"
                        class="block w-full border border-gray-300 rounded input-large mt-1" placeholder="NIK" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-medium" id="password-label">Kata Sandi:</label>
                    <input type="password" name="password" id="password"
                        class="block w-full border border-gray-300 rounded input-large mt-1" placeholder="Kata Sandi" required>
                </div>
                <div class="flex items-center justify-between px-32">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold btn-large rounded">Masuk</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            const usernameLabel = document.getElementById('username-label');
            const usernameInput = document.getElementById('username');
            const passwordLabel = document.getElementById('password-label');
            const passwordInput = document.getElementById('password');

            roleSelect.addEventListener('change', function() {
                if (roleSelect.value === 'patient') {
                    usernameLabel.textContent = 'NIK:';
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
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Login</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Remela.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f4f8;
            background-image: url('https://www.transparenttextures.com/patterns/diagmonds-light.png');
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0 2rem;
        }

        .card {
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 3rem;
            max-width: 400px;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .input {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0.75rem;
            width: 100%;
            margin-top: 0.25rem;
            transition: 0.3s ease;
        }

        .input:focus,
        .input:hover {
            outline: none;
            border-color: #6366f1;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
        }

        .btn-primary {
            text-transform: uppercase;
            letter-spacing: 2px;
            background-color: #6366f1;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: block;
            width: 100%;
            text-align: center;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #4f46e5;
            transform: translateY(-2px);
        }

        .btn-primary:active {
            background-color: #3730a3;
        }

        .error-message {
            background-color: #fee2e2;
            color: #b91c1c;
            border-color: #fca5a5;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .left-content {
            max-width: 600px;
            text-align: left;
            padding-right: 2rem;
        }

        .left-content h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .left-content p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: #4b5563;
        }

        .left-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
        }
    </style>
</head>

<body>
    <div class="left-content">
        <h1>Selamat Datang di Portal SuperAdmin Rekam Medis Elektronik</h1>

        <img src="{{ asset('images/healthcare-illustration.png') }}" alt="Healthcare Illustration">
    </div>
    <div class="card">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Super Admin Login</h2>
        @if ($errors->any())
            <div class="error-message">
                <strong>Oops!</strong>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('superadmin.login.post') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-lg font-semibold">Email:</label>
                <input type="email" name="email" id="email" class="input" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-lg font-semibold">Password:</label>
                <input type="password" name="password" id="password" class="input" required>
            </div>
            <div class="mb-4">
                <input type="checkbox" id="showPassword" onclick="togglePassword()">
                <label for="showPassword" class="text-gray-700">Tampilkan Password</label>
            </div>
            <button type="submit" class="btn-primary font-bold">Login</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>

</html>

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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }

        .input {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 0.75rem;
            width: 100%;
            margin-top: 0.25rem;
        }

        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            transition: background-color 0.3s;
            display: block;
            width: 100%;
            text-align: center;
            font-size: 1rem;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            text-align: center;
        }
    </style>
</head>

<body>
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
            <button type="submit" class="btn-primary font-bold">Login</button>
        </form>
    </div>
</body>

</html>

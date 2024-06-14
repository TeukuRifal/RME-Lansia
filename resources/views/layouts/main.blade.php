
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekam Medik Elektronik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container m-auto">
        @include('components.navbar')
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
</body>
</html>

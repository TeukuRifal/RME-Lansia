<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekam Medik Elektronik</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-lightblue">
    <div>
        @include('components.navbarpasien')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        document.getElementById('profileIcon').addEventListener('click', function() {
            var dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function(e) {
            var dropdown = document.getElementById('profileDropdown');
            if (!document.getElementById('profileIcon').contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

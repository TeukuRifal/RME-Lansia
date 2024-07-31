<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Remela.png') }}">
    {{-- font google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.17/jspdf.plugin.autotable.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        .roboto-medium {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: normal;
          }
      
          .roboto-bold {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: normal;
          }
      
          .roboto-black {
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-style: normal;
          }
      
          .roboto-medium-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-style: italic;
          }
      
          .roboto-bold-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            font-style: italic;
          }
      
          .roboto-black-italic {
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-style: italic;
          }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="">
    <div>
        @include('components.navbar')
        <main>
            @yield('content')
        </main>
        @include('components.footer')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>

</body>

</html>

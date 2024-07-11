<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wave Animation with Tailwind CSS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
    <div class=" h-screen mx-auto px-4 flex-grow">
        <div class="flex justify-center items-center">
            <div class="container flex flex-col md:flex-row justify-between items-center p-8 rounded-lg">
                <div class="welcome flex flex-col justify-center items-start text-left md:w-1/2">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di REMELA </h1>
                    <h3 class="text-4xl font-bold mb-4">Website Rekam Medik Lansia</h3>
                    <p class="text-xl mb-8">Silahkan login untuk mengakses halaman kesehatan Anda.</p>
                    <a href="{{ route('login') }}" class=" bg-lightblue hover:bg-teal-200 text-zinc-950 font-bold py-2 px-4 rounded">Login</a>
                </div>
                {{-- <div class="hidden md:flex md:w-1/2 justify-center">
                    <img src="{{ asset('images/welcomelansia.png') }}" alt="Welcome Image" class=" w-3/6 h-auto">
                </div> --}}
            </div>
        </div>
    </div>
    </div>
    
</body>

</html>

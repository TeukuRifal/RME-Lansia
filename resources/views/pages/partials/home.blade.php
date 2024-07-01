<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wave Animation with Tailwind CSS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes wave {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-25%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .waves g {
            animation: wave 10s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
        }

        .wave {
            height: 100px;
        }
    </style>
</head>

<body>
    <div class=" h-screen mx-auto px-4 flex-grow">
        <div class="flex justify-center items-center">
            <div class="container flex flex-col md:flex-row justify-between items-center p-8 rounded-lg">
                <div class="welcome flex flex-col justify-center items-start text-left md:w-1/2">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Website Rekam Medik Elektronik</h1>
                    <p class="text-lg mb-8">Silahkan login untuk mengakses halaman kesehatan Anda.</p>
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Login</a>
                </div>
                <div class="hidden md:flex md:w-1/2 justify-center">
                    <img src="{{ asset('images/welcomelansia.png') }}" alt="Welcome Image" class=" w-3/6 h-auto">
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

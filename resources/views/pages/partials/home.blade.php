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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }

        .slide-in {
            animation: slideIn 2s ease-in-out;
        }

        .slide-in-up {
            animation: slideInUp 2s ease-in-out;
        }

        .float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body>
    <div class="h-screen flex flex-col md:flex-row">
        <div class="flex-auto flex justify-center items-center p-8 md:p-20">
            <div class="mx-auto slide-in-up">
                <h1 class="text-4xl font-bold mb-4">Selamat Datang di REMELA</h1>
                <h3 class="text-3xl font-bold mb-4">Website Rekam Medik Elektronik Lansia</h3>
                <p class="text-xl mb-8">Silahkan masuk untuk mengakses halaman kesehatan Anda !!!</p>
                <a href="{{ route('login') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Login</a>
            </div>
        </div>
        <div class="flex-auto hidden md:flex justify-center items-center">
            <img src="{{ asset('images/Lansia.png') }}" alt="Welcome Image" class="w-4/8 h-auto slide-in float">
        </div>
    </div>
    
</body>

</html>

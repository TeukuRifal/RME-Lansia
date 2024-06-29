@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="scroll-smooth">
    <div class="container bg-add9d8 min-h-screen scroll-smooth">
        <div class="flex justify-center items-center min-h-screen">
            <div class="container flex flex-col md:flex-row justify-between items-center p-8 rounded-lg">
                <div class="welcome flex flex-col justify-center items-start text-left md:w-1/2">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di Rekam Medik Elektronik</h1>
                    <p class="text-lg mb-8">Silahkan login untuk mengakses halaman kesehatan Anda.</p>
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Login</a>
                </div>
                <div class="hidden md:flex md:w-1/2 justify-center">
                    <img src="{{ asset('images/welcome.jpeg') }}" alt="Welcome Image" class="w-3/4 h-auto">
                </div>
            </div>
        </div>
    
        <!-- Section Galeri -->
        <div id="galeri" class="container h-screen my-32 ">
            <h2 class="text-3xl font-bold mb-8 text-center">Galeri</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="gallery-item">
                    <img src="{{ asset('images/galeri1.jpeg') }}" alt="Gallery Image 1" class="w-full h-auto rounded-lg shadow-lg">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/galeri2.jpeg') }}" alt="Gallery Image 2" class="w-full h-auto rounded-lg shadow-lg">
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/galeri3.jpeg') }}" alt="Gallery Image 3" class="w-full h-auto rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    
        <!-- Section Kontak -->
        <div id="kontak" class="container my-16 bg-custom p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-8 text-center">Kontak</h2>
            <div class="flex flex-col md:flex-row justify-around">
                <div class="contact-item mb-8 md:mb-0 md:w-1/3 text-center">
                    <h3 class="text-2xl font-semibold mb-4">Alamat</h3>
                    <p>Jalan Kesehatan No. 123</p>
                    <p>Kota Sehat, 45678</p>
                </div>
                <div class="contact-item mb-8 md:mb-0 md:w-1/3 text-center">
                    <h3 class="text-2xl font-semibold mb-4">Telepon</h3>
                    <p>(021) 123-4567</p>
                </div>
                <div class="contact-item md:w-1/3 text-center">
                    <h3 class="text-2xl font-semibold mb-4">Email</h3>
                    <p>info@rekammedik.com</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection

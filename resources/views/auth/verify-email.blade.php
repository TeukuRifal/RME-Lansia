<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen  font-semibold">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg max-w-md w-full">
        <div class="text-center">
            <!-- Icon -->
            <svg class="w-16 h-16 mx-auto mb-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <!-- Heading and Message -->
            <h4 class="text-2xl font-semibold text-gray-700 mb-2">Selamat!</h4>
            <p class="text-gray-600 mb-4">Akun Anda berhasil terdaftar.
            <p class="text-gray-600">Kami telah mengirimkan link verifikasi ke email Anda. Silahkan cek email Anda dan
                klik link verifikasi.</p>

            <!-- Notification Message -->
            @if (session('resent'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Link verifikasi baru telah dikirim ke email Anda.</strong>
                </div>
            @endif
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit">Email tidak muncul ? Klik <span class=" text-blue-500">Disini</span></button>
            </form>
        </div>
    </div>
</body>

</html>

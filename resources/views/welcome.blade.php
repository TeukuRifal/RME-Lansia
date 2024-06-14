@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center">
        <div class="container justify-between flex ">
            <div class="welcome flex flex-col justify-center items-left">
                <h1 class="text-4xl font-bold mb-4">Selamat Datang di Rekam Medik Elektronik</h1>
                <p class="text-lg mb-8">Silahkan login untuk mengakses halaman kesehatan</p>
            </div>
            <div
                class="form max-w-96  bg-gradient-to-t from-white to-blue-100 rounded-3xl p-8 border-4 border-white shadow-lg mt-5">
                <div class="text-center font-extrabold text-2xl text-blue-600">Masuk</div>
                <form action="" class="mt-5">
                    <input required
                        class="w-full bg-white border-none py-3 px-5 rounded-xl mt-4 shadow focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="email" name="email" id="email" placeholder=" NIK">
                    <input required
                        class="w-full bg-white border-none py-3 px-5 rounded-xl mt-4 shadow focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="password" name="password" id="password" placeholder="Tanggal Lahir">
                    <span class="block mt-3 ml-2">

                    </span>
                    <input
                        class="w-full font-bold bg-gradient-to-r from-blue-600 to-blue-500 text-white py-3 mt-5 rounded-xl shadow transform transition-transform duration-200 hover:scale-105 hover:shadow-lg active:scale-95 active:shadow-md border-none"
                        type="submit" value="Masuk">
                </form>

            </div>

        </div>

    </div>
    </div>
@endsection

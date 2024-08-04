@extends('layouts.main')

@section('title', 'Media Edukasi - Kesehatan')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="relative bg-cover bg-no-repeat bg-center rounded-lg shadow-md py-12 mb-8 overflow-hidden"
            style="background-image: url('{{ asset('images/Hexagon.svg') }}');">
            <div class="absolute inset-0 flex items-center justify-center">
                <img src="{{ asset('images/komputer.png') }}" class="absolute left-0 top-0 w-24 h-auto" alt="Logo Komputer">
                <img src="{{ asset('images/hati.png') }}" class="absolute right-0 bottom-0 w-24 h-auto" alt="Logo Hati">
            </div>
            <div class="text-center">
                <h1 class="text-4xl font-extrabold mb-4 text-white">Media Edukasi Kesehatan</h1>
                <p class="text-lg text-white mb-6">Informasi penting untuk menjaga kesehatan tubuh, termasuk tips, penyakit
                    umum, dan cara pengelolaannya.</p>
            </div>
        </section>

        <!-- Content Sections -->
        <div class="space-y-8">
            <!-- Navigation Bar -->
            <nav class="bg-white rounded-lg shadow-md p-4 mb-6">
                <ul class="flex space-x-6 justify-center">
                    <!-- Cara Menjaga Kesehatan -->
                    <li>
                        <a href="#cara-menjaga-kesehatan"
                            class="flex items-center text-cyan-600 hover:text-cyan-800 transition-colors duration-300">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h1m-2 0H7a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2v-2h-6a2 2 0 0 0-2-2v-1a2 2 0 0 0-2-2z">
                                </path>
                            </svg>
                            Cara Menjaga Kesehatan
                        </a>
                    </li>
                    <!-- Tentang Asam Urat -->
                    <li>
                        <a href="#tentang-asam-urat"
                            class="flex items-center text-cyan-600 hover:text-cyan-800 transition-colors duration-300">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V2m0 20v-4m-4 4h8M5.636 5.636l1.414-1.414m12.728 12.728l-1.414-1.414M4 12H0m24 0h-4M5.636 18.364l1.414 1.414M18.364 5.636l-1.414-1.414">
                                </path>
                            </svg>
                            Tentang Asam Urat
                        </a>
                    </li>
                    <!-- Indeks Massa Tubuh -->
                    <li>
                        <a href="#indeks-massa-tubuh"
                            class="flex items-center text-cyan-600 hover:text-cyan-800 transition-colors duration-300">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7">
                                </path>
                            </svg>
                            Indeks Massa Tubuh
                        </a>
                    </li>
                    <!-- Kesehatan Mental -->
                    <li>
                        <a href="#kesehatan-mental"
                            class="flex items-center text-cyan-600 hover:text-cyan-800 transition-colors duration-300">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1.5m0 15V21m-4.5-4.5h9m-6-6.75h3m-3 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z">
                                </path>
                            </svg>
                            Kesehatan Mental
                        </a>
                    </li>
                    <!-- Gejala Penyakit Umum -->
                    <li>
                        <a href="#gejala-penyakit-umum"
                            class="flex items-center text-cyan-600 hover:text-cyan-800 transition-colors duration-300">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19.5L9 12l-3-3 3-3 3 3 6 6-3 3z"></path>
                            </svg>
                            Gejala Penyakit Umum
                        </a>
                    </li>
                    <!-- Tips Hidup Sehat -->
                    <li>
                        <a href="#tips-hidup-sehat"
                            class="flex items-center text-cyan-600 hover:text-cyan-800 transition-colors duration-300">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4zm2 0v4h4V4H5zm0 0V4zM3 12a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4zm2 0v4h4v-4H5zm0 0V12zM3 20a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4zm2 0v4h4v-4H5zm0 0V20z">
                                </path>
                            </svg>
                            Tips Hidup Sehat
                        </a>
                    </li>
                </ul>
            </nav>


            <!-- Section 1: Cara Menjaga Kesehatan -->
            <section id="cara-menjaga-kesehatan" class="bg-white rounded-lg shadow-lg p-6">
                <div class="md:flex md:items-center ">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset('images/hidupsehat.jpeg') }}" alt="Cara Menjaga Kesehatan"
                            class="rounded-lg shadow-lg object-cover w-full h-72">
                    </div>
                    <div class="md:w-1/2 ml-4">
                        <h2 class="text-3xl font-bold mb-4 text-gray-900">Cara Menjaga Kesehatan</h2>
                        <p class="text-lg text-gray-700 mb-4">Menjaga kesehatan adalah hal yang sangat penting. Berikut
                            adalah beberapa tips untuk menjaga kesehatan Anda:</p>
                        <ul class="list-disc pl-5 text-gray-700 mb-4">
                            <li>Makan makanan bergizi</li>
                            <li>Olahraga secara teratur</li>
                            <li>Minum air putih yang cukup</li>
                            <li>Istirahat yang cukup</li>
                            <li>Hindari stres</li>
                        </ul>
                        <a href="#" class="text-cyan-600 hover:underline">Pelajari lebih lanjut tentang pola makan
                            sehat</a>
                    </div>
                </div>
            </section>

            <!-- Section 2: Tentang Asam Urat -->
            <section id="tentang-asam-urat" class="bg-white rounded-lg shadow-lg p-6">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset('images/asamurat.jpeg') }}" alt="Tentang Asam Urat"
                            class="rounded-lg shadow-lg object-cover w-full h-72">
                    </div>
                    <div class="md:w-1/2 ml-4">
                        <h2 class="text-3xl font-bold mb-4 text-gray-900">Tentang Asam Urat</h2>
                        <p class="text-lg text-gray-700 mb-4">Asam urat adalah kondisi di mana terdapat kadar asam urat yang
                            tinggi dalam darah. Berikut adalah beberapa hal yang perlu Anda ketahui tentang asam urat:</p>
                        <ul class="list-disc pl-5 text-gray-700 mb-4">
                            <li>Gejala asam urat</li>
                            <li>Penyebab asam urat</li>
                            <li>Cara mengelola asam urat</li>
                            <li>Makanan yang harus dihindari</li>
                        </ul>
                        <a href="#" class="text-cyan-600 hover:underline">Pelajari lebih lanjut tentang manajemen
                            asam urat</a>
                    </div>
                </div>
            </section>

            <!-- Section 3: Indeks Massa Tubuh -->
            <section id="indeks-massa-tubuh" class="bg-white rounded-lg shadow-lg p-6">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset('images/imt.jpeg') }}" alt="Indeks Massa Tubuh"
                            class="rounded-lg shadow-lg object-cover w-full h-72">
                    </div>
                    <div class="md:w-1/2 ml-4">
                        <h2 class="text-3xl font-bold mb-4 text-gray-900">Indeks Massa Tubuh</h2>
                        <p class="text-lg text-gray-700 mb-4">Indeks Massa Tubuh (IMT) adalah ukuran yang digunakan untuk
                            menilai berat badan seseorang dalam hubungannya dengan tinggi badannya. Berikut adalah beberapa
                            informasi tentang IMT:</p>
                        <ul class="list-disc pl-5 text-gray-700 mb-4">
                            <li>Cara menghitung IMT</li>
                            <li>Kategori IMT</li>
                            <li>Pentingnya menjaga IMT yang sehat</li>
                        </ul>
                        <button id="open-modal-btn"
                            class="inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-cyan-600 rounded-lg shadow-lg hover:bg-cyan-700 transition-transform transform hover:scale-105 active:scale-95">
                            <span class="relative">Gunakan kalkulator IMT kami</span>
                        </button>
                    </div>
                </div>
            </section>

            <!-- Modal for IMT Calculator -->
            <div id="bmi-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md mx-4 md:mx-0">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-bold text-gray-900">Kalkulator IMT</h2>
                        <button id="close-modal-btn" class="text-gray-600 hover:text-gray-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="space-y-4">
                        <p class="text-gray-700 mb-4">Gunakan kalkulator ini untuk menghitung IMT Anda. Masukkan berat
                            badan dan tinggi badan Anda untuk mengetahui hasilnya.</p>
                        <form>
                            <div class="mb-4">
                                <label for="weight" class="block text-gray-700 mb-2">Berat Badan (kg)</label>
                                <input type="number" id="weight" name="weight"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-600"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="height" class="block text-gray-700 mb-2">Tinggi Badan (cm)</label>
                                <input type="number" id="height" name="height"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-600"
                                    required>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-cyan-600 rounded-lg shadow-lg hover:bg-cyan-700 transition-transform transform hover:scale-105 active:scale-95">
                                Hitung IMT
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Section 4: Kesehatan Mental -->
            <section id="kesehatan-mental" class="bg-white rounded-lg shadow-lg p-6">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset('images/mental.jpeg') }}" alt="Kesehatan Mental"
                            class="rounded-lg shadow-lg object-cover w-full h-72">
                    </div>
                    <div class="md:w-1/2 ml-4">
                        <h2 class="text-3xl font-bold mb-4 text-gray-900">Kesehatan Mental</h2>
                        <p class="text-lg text-gray-700 mb-4">Kesehatan mental adalah aspek penting dari kesehatan
                            keseluruhan. Berikut adalah beberapa cara untuk menjaga kesehatan mental Anda:</p>
                        <ul class="list-disc pl-5 text-gray-700 mb-4">
                            <li>Berbicara dengan seseorang</li>
                            <li>Melakukan aktivitas yang menyenangkan</li>
                            <li>Menjaga keseimbangan kerja dan kehidupan</li>
                            <li>Berlatih mindfulness atau meditasi</li>
                        </ul>
                        <a href="#" class="text-cyan-600 hover:underline">Pelajari lebih lanjut tentang cara menjaga
                            kesehatan mental</a>
                    </div>
                </div>
            </section>

            <!-- Section 5: Gejala Penyakit Umum -->
            <section id="gejala-penyakit-umum" class="bg-white rounded-lg shadow-lg p-6">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset('images/penyakitumum.jpeg') }}" alt="Gejala Penyakit Umum"
                            class="rounded-lg shadow-lg object-cover w-full h-72">
                    </div>
                    <div class="md:w-1/2 ml-4">
                        <h2 class="text-3xl font-bold mb-4 text-gray-900">Gejala Penyakit Umum</h2>
                        <p class="text-lg text-gray-700 mb-4">Mengetahui gejala penyakit umum dapat membantu Anda dalam
                            deteksi dini dan pengobatan. Berikut adalah beberapa gejala penyakit umum yang perlu
                            diperhatikan:</p>
                        <ul class="list-disc pl-5 text-gray-700 mb-4">
                            <li>Demam</li>
                            <li>Batuk</li>
                            <li>Sesak napas</li>
                            <li>Nyeri tubuh</li>
                            <li>Keletihan</li>
                        </ul>
                        <a href="#" class="text-cyan-600 hover:underline">Pelajari lebih lanjut tentang gejala
                            penyakit umum</a>
                    </div>
                </div>
            </section>

            <!-- Section 6: Tips Hidup Sehat -->
            <section id="tips-hidup-sehat" class="bg-white rounded-lg shadow-lg p-6">
                <div class="md:flex md:items-center ">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <img src="{{ asset('images/sehat.jpg') }}" alt="Tips Hidup Sehat"
                            class="rounded-lg shadow-lg object-cover w-full h-72">
                    </div>
                    <div class="md:w-1/2 ml-4">
                        <h2 class="text-3xl font-bold mb-4 text-gray-900">Tips Hidup Sehat</h2>
                        <p class="text-lg text-gray-700 mb-4">Mengadopsi kebiasaan hidup sehat dapat meningkatkan kualitas
                            hidup Anda. Berikut adalah beberapa tips untuk hidup sehat:</p>
                        <ul class="list-disc pl-5 text-gray-700 mb-4">
                            <li>Makan makanan sehat</li>
                            <li>Berolahraga secara rutin</li>
                            <li>Menjaga pola tidur</li>
                            <li>Hindari kebiasaan buruk</li>
                        </ul>
                        <a href="#" class="text-cyan-600 hover:underline">Pelajari lebih lanjut tentang tips hidup
                            sehat</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        document.getElementById('open-modal-btn').addEventListener('click', function() {
            document.getElementById('bmi-modal').classList.remove('hidden');
        });

        document.getElementById('close-modal-btn').addEventListener('click', function() {
            document.getElementById('bmi-modal').classList.add('hidden');
        });
    </script>
@endsection

<!-- Section Galeri -->
<div id="profil" class=" h-screen m-auto mt-32 p-5 rounded-xl bg-white">
    <h2 class="text-3xl font-bold mb-8 text-center bg">Galeri</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 m-auto w-3/4 h-auto gap-8 text-xl">
        <div class="gallery-item">
            <img src="{{ asset('images/galeri1.jpeg') }}" alt="Gallery Image 1" class="w-full h-auto rounded-lg shadow-lg">
            <p class="h-32 shadow-md bg-white rounded-lg p-5">Pertemuan pertama </p>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/galeri2.jpeg') }}" alt="Gallery Image 2"
                class="w-full h-auto rounded-lg shadow-lg">
            <p class="h-32 shadow-md bg-white rounded-lg p-5">Pertemuan Kedua </p>
        </div>
        <div class="gallery-item">
            <img src="{{ asset('images/galeri3.jpeg') }}" alt="Gallery Image 3"
                class="w-full h-auto rounded-lg shadow-lg">
            <p class="h-32 shadow-md bg-white rounded-lg p-5">Pertemuan Ketiga </p>
        </div>
    </div>
</div>

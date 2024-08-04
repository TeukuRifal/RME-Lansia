<!-- Footer Section -->
<footer class="bg-[#55A6C8] text-white py-10">
    <div class="container mx-auto flex flex-wrap justify-between">
        <div class="w-full lg:w-1/3 p-5">
            <h2 class="text-2xl font-bold mb-4">posbindu</h2>
            <p class="mb-4">
                posbindu Menjadi solusi digital terdepan dalam pemantauan kesehatan lansia, yang mendukung
                peningkatan kualitas hidup melalui inovasi dan teknologi yang mudah diakses.
            </p>
            <p class="mb-2">info@remela.id</p>
            <p>Telepon: +62 852</p>
        </div>
        <div class="w-full lg:w-1/4 p-5">
            <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
            <ul>
                <li class="mb-2"><a href="{{ route('beranda') }}" class="hover:underline">Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('jadwal') }}" class="hover:underline">Jadwal Dokter</a></li>
                <li class="mb-2"><a href="{{ route('profil') }}" class="hover:underline">Profil</a></li>
            </ul>
        </div>
        <div class="w-full lg:w-1/4 p-5">
            <h3 class="text-xl font-semibold mb-4">Social Media</h3>
            <div class="flex space-x-4 mb-6">
                <a href="#" class="hover:text-gray-300"><img src="{{ asset('images/Facebook.png') }}"
                        alt="Facebook" class="w-6 h-6"></a>
                <a href="#" class="hover:text-gray-300"><img src="{{ asset('images/Twitter.png') }}"
                        alt="Twitter" class="w-6 h-6"></a>
                <a href="#" class="hover:text-gray-300"><img src="{{ asset('images/Instagram.png') }}"
                        alt="Instagram" class="w-6 h-6"></a>
                <a href="#" class="hover:text-gray-300"><img src="{{ asset('images/Linkedin.png') }}"
                        alt="LinkedIn" class="w-6 h-6"></a>
                <a href="#" class="hover:text-gray-300"><img src="{{ asset('images/Youtube.png') }}"
                        alt="YouTube" class="w-6 h-6"></a>
            </div>
            <h3 class="text-xl font-semibold mb-4">Subscribe</h3>
            <div class="flex">
                <input type="email" class="w-full p-2 rounded-l-lg bg-gray-200 text-gray-700"
                    placeholder="info@remela.id">
                <button class="bg-white text-lightblue p-2 rounded-r-lg font-semibold">Send</button>
            </div>
        </div>
    </div>
</footer>

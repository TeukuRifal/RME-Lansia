<nav class="py-4 px-10 font-poppins inset-x-0 top-0 shadow-sm m-2 rounded-md bg-white ">
  <div class="flex items-center justify-between">
    <div class="navbar-logo">
      <a href="/" class="text-3xl font-inter-italic text-black font-bold">Rekam Medik Elektronik</a>
    </div>
    @guest
    <div class="hidden md:flex items-center space-x-8 font-semibold text-2xl">
      <a href="/" class="p-2">Beranda</a>
      <a href="#galeri" class="p-2">Galeri</a>
      <a href="#kontak" class="p-2">Kontak</a>
      <a href="{{ route('login') }}" class="p-2">Login</a>
    </div>
    @endguest

    @auth
    <div class="hidden md:flex items-center space-x-8 font-semibold text-2xl">
      <a href="{{ route('kesehatan') }}" class="p-2">Kesehatan</a>
      <div class="relative">
        <img src="https://cdn-icons-png.flaticon.com/128/2102/2102647.png" alt="Profile" id="profileIcon" class="w-10 h-10 rounded-full cursor-pointer">
        <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-20">
          <div class="flex items-center px-4 py-2">
            <img src="https://cdn-icons-png.flaticon.com/128/2102/2102647.png" alt="Profile" class="w-10 h-10 rounded-full">
            <div class="ml-3 text-sm">
              <h2 class="">{{ Auth::user()->name }}</h2>
            </div>
          </div>
          <div class="border-t mt-2"></div>
          <a href="{{ route('profil') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
          <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
            @csrf
            <button type="submit" class="w-full text-left">Keluar</button>
          </form>
        </div>
      </div>
    </div>
    @endauth
  </div>
</nav>

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

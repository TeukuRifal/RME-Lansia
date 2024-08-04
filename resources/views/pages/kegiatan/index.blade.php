@extends('layouts.admin')

@section('content')
<style>
    .truncate-multiline {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Jumlah baris yang diizinkan */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .modal {
        transition: opacity 0.25s ease;
    }
</style>

<div id="galeri" class="container mx-auto p-5 bg-white">
    <h2 class="text-4xl font-bold mb-12 text-center mt-10 text-gray-900">Kegiatan</h2>
    <div class="flex justify-end mb-4">
        <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300" onclick="openAddModal()">
            <i class="bi bi-folder-plus mr-2"></i>Tambah Dokumentasi
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-xl">
        @foreach ($aktivitas as $kegiatan)
        <div class="gallery-item relative group">
            <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->judul }}"
                class="w-full h-64 object-cover rounded-lg shadow-lg transform group-hover:scale-105 transition duration-300 cursor-pointer"
                onclick="openViewModal('{{ asset('storage/' . $kegiatan->gambar) }}', '{{ $kegiatan->judul }}', '{{ $kegiatan->deskripsi }}', '{{ \Carbon\Carbon::parse($kegiatan->tgl_aktivitas)->format('d M Y') }}')">
            <div class="h-32 shadow-md bg-white rounded-lg p-5 text-center mt-4 text-wrap truncate-multiline">
                <p class="font-bold text-lg text-gray-900">{{ $kegiatan->judul }}</p>
                <p class="text-sm text-gray-700 mt-1">{{ $kegiatan->deskripsi }}</p>
                <p class="text-sm text-gray-500 mt-1">
                    {{ \Carbon\Carbon::parse($kegiatan->tgl_aktivitas)->format('d M Y') }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- View Modal -->
<div id="viewModal" class="fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center hidden modal" onclick="closeModalOnClickOutside(event, 'viewModal')">
    <div class="bg-white p-8 rounded-lg max-w-xl mx-auto shadow-lg" onclick="event.stopPropagation()">
        <div class="text-right">
            <button class="text-red-500" onclick="closeModal('viewModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <img id="viewModalImage" src="" alt="" class="w-full h-64 object-cover rounded-lg">
        <h3 id="viewModalTitle" class="text-2xl font-bold mt-4 text-gray-900"></h3>
        <p id="viewModalDescription" class="text-gray-700 mt-2"></p>
        <p id="viewModalDate" class="text-gray-500 mt-2"></p>
    </div>
</div>

<!-- Add Modal -->
<div id="addModal" class="fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center hidden modal" onclick="closeModalOnClickOutside(event, 'addModal')">
    <div class="bg-white p-8 rounded-lg max-w-xl mx-auto shadow-lg" onclick="event.stopPropagation()">
        <div class="text-right">
            <button class="text-red-500" onclick="closeModal('addModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form action="{{ route('aktivitas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="tgl_aktivitas" class="block text-sm font-medium text-gray-700">Tanggal Aktivitas</label>
                <input type="date" name="tgl_aktivitas" id="tgl_aktivitas"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex justify-end space-x-4">
                <button type="button"
                    class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition duration-300"
                    onclick="closeModal('addModal')">
                    <i class="fas fa-times mr-2"></i>Batal
                </button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">
                    <i class="fas fa-save mr-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openViewModal(image, title, description, date) {
        document.getElementById('viewModalImage').src = image;
        document.getElementById('viewModalTitle').textContent = title;
        document.getElementById('viewModalDescription').textContent = description;
        document.getElementById('viewModalDate').textContent = date;
        document.getElementById('viewModal').classList.remove('hidden');
    }

    function openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function closeModalOnClickOutside(event, modalId) {
        if (event.target.id === modalId) {
            closeModal(modalId);
        }
    }
</script>
@endsection

<x-app-layout>
    <div class="bg-[#fff8d6] min-h-screen">

        <!-- 🔹 Judul Halaman -->
        <section class="bg-yellow-50 py-10 shadow-md border-b border-[#fcd34d]">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="text-3xl font-bold text-[#004d93] uppercase tracking-wide">Galeri Kegiatan</h1>
                <p class="text-sm mt-2 text-gray-700">Dokumentasi kegiatan dan momen penting kami</p>
            </div>
        </section>

        <!-- 🔹 Grid Galeri -->
        <section class="max-w-7xl mx-auto px-6 py-12">
            @if($galleries->isEmpty())
                <div class="text-center text-gray-500 py-20">
                    <i data-feather="image" class="w-10 h-10 mx-auto mb-3 text-gray-400"></i>
                    <p>Belum ada gambar di galeri.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($galleries as $gallery)
                        <div class="bg-yellow-50 rounded-xl shadow-md overflow-hidden border border-[#fcd34d]/40 hover:shadow-lg transition duration-300">
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $gallery->gambar) }}" 
                                     alt="{{ $gallery->judul }}" 
                                     class="w-full h-56 object-cover group-hover:opacity-90 transition duration-300">

                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-[#004d93]/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                    <button 
                                        onclick="showModal('{{ asset('storage/' . $gallery->gambar) }}', '{{ $gallery->judul }}', '{{ $gallery->deskripsi }}')" 
                                        class="bg-[#fcd34d] text-[#004d93] px-4 py-2 rounded-md font-semibold shadow hover:bg-[#fcd34d]/80 transition">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>

                            <div class="p-4 text-center">
                                <h3 class="text-lg font-semibold text-[#004d93]">{{ $gallery->judul }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $galleries->links() }}
                </div>
            @endif
        </section>
    </div>

    <!-- 🔹 Modal Preview -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-60 hidden items-center justify-center z-50">
        <div class="bg-yellow-50 rounded-xl shadow-lg max-w-lg w-full mx-4 overflow-hidden border border-[#fcd34d]/60">
            <div class="relative">
                <img id="modalImage" src="" alt="Preview" class="w-full h-80 object-cover">
                <button onclick="closeModal()" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow hover:bg-[#fcd34d]/40">
                    <i data-feather="x" class="w-5 h-5 text-[#004d93]"></i>
                </button>
            </div>
            <div class="p-5">
                <h2 id="modalTitle" class="text-xl font-bold text-[#004d93]"></h2>
                <p id="modalDesc" class="text-gray-700 mt-2 text-sm"></p>
            </div>
        </div>
    </div>

    <!-- 🔹 Feather & Modal Script -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();

        function showModal(image, title, desc) {
            document.getElementById('modalImage').src = image;
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalDesc').innerText = desc;
            document.getElementById('imageModal').classList.remove('hidden');
            document.getElementById('imageModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
            document.getElementById('imageModal').classList.remove('flex');
        }
    </script>
</x-app-layout>

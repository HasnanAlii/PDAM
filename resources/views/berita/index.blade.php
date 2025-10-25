<x-app-layout>
    <div class="bg-[#fff8d6] min-h-screen">

        <!-- 🔹 Judul Halaman -->
        <section class="bg-yellow-50 py-10 shadow-md border-b border-[#fcd34d]">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="text-3xl font-bold text-[#004d93] uppercase tracking-wide">Berita Terbaru</h1>
                <p class="text-sm mt-2 text-gray-700">Informasi terkini seputar Perumdam Tirta Mukti</p>
            </div>
        </section>

          <!-- Konten Utama -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12 grid lg:grid-cols-3 gap-10">

            <!-- Daftar Berita -->
            <div class="lg:col-span-2 space-y-6" id="berita-container">
                @include('berita.partials.berita-list', ['beritas' => $beritas])

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $beritas->links() }}
                </div>
            </div>

                <!-- 📑 Sidebar -->
                <aside class="space-y-10">

                        <div class="bg-yellow-50 rounded-xl shadow p-6 border-l-4 border-[#004d93]">
                            <h3 class="text-lg font-semibold text-[#004d93] mb-4 border-b border-yellow-200 pb-2">KATEGORI</h3>
                            <ul class="space-y-2 text-gray-700">
                                <li><button data-kategori="" class="kategori-btn hover:text-[#004d93]">Semua</button></li>
                                <li><button data-kategori="Berita Umum" class="kategori-btn hover:text-[#004d93]">Berita Umum</button></li>
                                <li><button data-kategori="Kegiatan" class="kategori-btn hover:text-[#004d93]">Kegiatan</button></li>
                                <li><button data-kategori="Pengumuman" class="kategori-btn hover:text-[#004d93]">Pengumuman</button></li>
                                <li><button data-kategori="Teknologi" class="kategori-btn hover:text-[#004d93]">Teknologi</button></li>
                                <li><button data-kategori="Layanan" class="kategori-btn hover:text-[#004d93]">Layanan</button></li>
                            </ul>
                        </div>


 
                    <!-- 🗳️ Pemungutan Suara -->
                    <div class="bg-yellow-50 rounded-xl shadow p-6 border-l-4 border-[#004d93]">
                        <h3 class="text-lg font-semibold text-[#004d93] mb-4 border-b border-yellow-200 pb-2">
                            PEMUNGUTAN SUARA
                        </h3>
                        <p class="text-sm text-gray-700 mb-4">
                            Bagaimana kualitas pelayanan Perumdam Tirta Mukti saat ini?
                        </p>
                        <form class="space-y-3">
                            <label class="flex items-center">
                                <input type="radio" name="vote" class="text-[#004d93] focus:ring-[#004d93]">
                                <span class="ml-2">Sangat Baik</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="vote" class="text-[#004d93] focus:ring-[#004d93]">
                                <span class="ml-2">Baik</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="vote" class="text-[#004d93] focus:ring-[#004d93]">
                                <span class="ml-2">Cukup</span>
                            </label>

                            <input type="text" placeholder="Nomor Pelanggan" 
                                   class="w-full border rounded-md p-2 text-sm mt-3 focus:ring-[#fcd34d] focus:border-[#004d93]">
                            <input type="text" placeholder="Nomor Kontak" 
                                   class="w-full border rounded-md p-2 text-sm focus:ring-[#fcd34d] focus:border-[#004d93]">

                            <div class="flex items-center gap-2 mt-3">
                                <button type="button" class="bg-[#004d93] text-white px-3 py-1.5 rounded-md hover:bg-[#003b72] text-sm">
                                    Proses
                                </button>
                                <a href="#" class="text-[#004d93] text-sm hover:underline">Lihat Hasil</a>
                            </div>
                        </form>
                    </div>
{{-- 
                    <!-- 📰 Berita Terpopuler -->
                    <div class="bg-yellow-50 rounded-xl shadow p-6 border-l-4 border-[#004d93]">
                        <h3 class="text-lg font-semibold text-[#004d93] mb-4 border-b border-yellow-200 pb-2">
                            BERITA TERPOPULER
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex gap-3">
                                <div class="w-16 h-16 bg-gray-200 rounded overflow-hidden">
                                    <img src="https://via.placeholder.com/80x80" class="object-cover w-full h-full" alt="">
                                </div>
                                <div>
                                    <a href="#" class="font-medium text-[#004d93] hover:underline">
                                        Prosedur Pembayaran Tagihan Air
                                    </a>
                                    <p class="text-xs text-gray-500">20 Okt 2025</p>
                                </div>
                            </li>
                            <li class="flex gap-3">
                                <div class="w-16 h-16 bg-gray-200 rounded overflow-hidden">
                                    <img src="https://via.placeholder.com/80x80" class="object-cover w-full h-full" alt="">
                                </div>
                                <div>
                                    <a href="#" class="font-medium text-[#004d93] hover:underline">
                                        Pemeliharaan Jaringan Air Cianjur
                                    </a>
                                    <p class="text-xs text-gray-500">18 Sep 2025</p>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                </aside>
            </div>
        </div>
    </div>

       <!-- Script Filter AJAX -->
    <script>
        document.querySelectorAll('.kategori-btn').forEach(button => {
            button.addEventListener('click', () => {
                const kategori = button.getAttribute('data-kategori');

                fetch(`/berita/filter?kategori=${encodeURIComponent(kategori)}`)
                    .then(res => res.text())
                    .then(html => {
                        document.querySelector('#berita-container').innerHTML = html;
                        window.scrollTo({ top: 100, behavior: 'smooth' });
                    })
                    .catch(err => console.error(err));
            });
        });
    </script>

</x-app-layout>






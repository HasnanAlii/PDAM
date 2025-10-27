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


 
              <div class="bg-yellow-50 rounded-xl shadow p-6 border-l-4 border-[#004d93]">
    <h3 class="text-lg font-semibold text-[#004d93] mb-4 border-b border-yellow-200 pb-2">
        HEADLINE NEWS
    </h3>

    @if ($beritas->count() > 0)
        <div class="space-y-4">
            @foreach ($beritas->take(3) as $berita)
                <div class="border border-yellow-200 rounded-lg p-3 hover:bg-yellow-100 transition">
                    <h4 class="text-[#004d93] font-semibold text-base">
                        {{ $berita->judul }}
                    </h4>

                    <p class="text-sm text-gray-700 mt-1 line-clamp-3">
                        {{ Str::limit(strip_tags($berita->isi ?? ''), 120, '...') }}
                    </p>

                    <div class="flex items-center justify-between mt-2">
                        <span class="text-xs text-gray-500">
                            {{ $berita->created_at->format('d M Y') }}
                        </span>
                        <a href="{{ route('berita.show', $berita->id) }}" 
                           class="text-[#004d93] text-sm font-medium hover:underline">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 italic text-sm text-center mt-4">
            Belum ada berita terbaru.
        </p>
    @endif
</div>


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






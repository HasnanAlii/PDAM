<!-- 🔹 Footer -->
<footer class="bg-[#004d93] text-white shadow-inner">
    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

        <!-- 🏢 Tentang -->
        <div>
            <div class="flex items-center mb-4">
                <img src="{{ asset('storage/logo.png') }}" 
                     alt="Logo Perumdam Tirta Mukti" 
                     class="h-16 w-auto">
                <h3 class="text-lg font-semibold leading-tight ml-3">
                    Perumdam Tirta Mukti
                </h3>
            </div>
            <p class="text-gray-200 text-sm leading-relaxed mb-4">
                Perumdam Tirta Mukti melayani penyediaan air bersih di Kabupaten Cianjur dengan komitmen pelayanan terbaik dan berkelanjutan.
            </p>
            <a href="{{ route('tentangkami.index') }}" class="inline-block text-[#fcd34d] hover:text-yellow-300 text-sm font-semibold transition">
                Selengkapnya →
            </a>
        </div>

        <!-- 🧭 Navigasi -->
        <div>
            <h4 class="text-lg font-semibold mb-4 border-b-2 border-[#fcd34d] inline-block pb-1">Navigasi</h4>
            <ul class="space-y-2 text-gray-200 text-sm">
                <li><a href="{{ route('beranda.index') }}" class="hover:text-[#fcd34d]">Beranda</a></li>
                <li><a href="{{ route('tentangkami.index') }}" class="hover:text-[#fcd34d]">Tentang Kami</a></li>
                <li><a href="{{ route('berita.index') }}" class="hover:text-[#fcd34d]">Berita</a></li>
                <li><a href="{{ route('galeri.index') }}" class="hover:text-[#fcd34d]">Galeri</a></li>
            </ul>
        </div>

        <!-- 🕒 Jam Operasional -->
        <div>
            <h4 class="text-lg font-semibold mb-4 border-b-2 border-[#fcd34d] inline-block pb-1">Jam Operasional</h4>
            <ul class="text-gray-200 text-sm space-y-2">
                <li>Senin - Jumat: 08.00 - 16.00 WIB</li>
                <li>Sabtu: 08.00 - 12.00 WIB</li>
                <li>Minggu & Libur Nasional: Tutup</li>
            </ul>
            <p class="text-xs text-gray-400 mt-4 italic">
                Untuk pelayanan darurat, hubungi call center kami yang siap 24 jam.
            </p>
        </div>

        <!-- ☎️ Kontak -->
        <div>
            <h4 class="text-lg font-semibold mb-4 border-b-2 border-[#fcd34d] inline-block pb-1">Kontak Kami</h4>
            <ul class="text-gray-200 text-sm space-y-2">
                <li>📍 Jl. Pangeran Hidayatullah, Limbangansari, Cianjur, Jawa Barat 43211</li>
                <li>📞 (0263) 261157</li>
                <li>📧 info@tirta-murti.co.id</li>
            </ul>

            <!-- Sosial Media -->
            <div class="flex space-x-4 mt-4 text-xl">
                <a href="https://www.facebook.com/perumdam.cianjur?locale=id_ID" target="_blank" class="hover:text-[#fcd34d]">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/perumdam.cianjur/" target="_blank" class="hover:text-[#fcd34d]">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/@perumdamtirtamukti5243/featured" target="_blank" class="hover:text-[#fcd34d]">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://twitter.com/perumdamcianjur" target="_blank" class="hover:text-[#fcd34d]">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.tiktok.com/@perumdam.cianjur" target="_blank" class="hover:text-[#fcd34d]">
                    <i class="fab fa-tiktok"></i>
                </a>
            </div>
        </div>

    </div>

    <!-- Copyright -->
    <div class="bg-[#00396f] text-center py-3 text-gray-300 text-sm shadow-inner">
        © {{ date('Y') }} Perumdam Air Minum Tirta Mukti. Semua hak cipta dilindungi.
    </div>
</footer>

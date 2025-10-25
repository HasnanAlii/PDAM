<x-app-layout>
    <div class="bg-[#f9fafb] min-h-screen">

        <!-- 🔹 Hero Section -->
        <div class="bg-[#fff8d6] shadow-inner">
            <section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-black mb-4 leading-snug border-l-4 border-[#004d93] pl-4">
                        Perumdam Tirta Mukti
                    </h2>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Perumda Air Minum Tirta Raharja merupakan perusahaan daerah yang bergerak di bidang penyediaan dan pengelolaan air bersih untuk masyarakat Kabupaten Cianjur.
                        Kami berkomitmen memberikan pelayanan prima melalui sistem distribusi air yang berkualitas, efisien, dan berkelanjutan.
                    </p>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Dengan semangat profesionalisme dan inovasi, Tirta Raharja terus berupaya meningkatkan kepuasan pelanggan serta mendukung pembangunan daerah melalui pelayanan air minum yang sehat dan terjangkau.
                    </p>
                </div>

                <div class="rounded-2xl overflow-hidden shadow-lg border-4 border-[#fcd34d]/40 hover:shadow-xl transition">
                    <img src="{{ asset('images/pdam-profil.jpg') }}" 
                        alt="Profil Perumda Air Minum Tirta Raharja" 
                        class="w-full h-full object-cover">
                </div>
            </section>
        </div>

        <!-- 🔹 Info Cepat -->
        <section class="bg-yellow-50 py-16 shadow-inner">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-6 text-center">
                @php
                    $infos = [
                        ['icon' => 'book-open', 'title' => 'BERITA', 'desc' => 'Lihat berita, kegiatan, dan pengumuman terbaru dari Perumdam Tirta Mukti.'],
                        ['icon' => 'file-text', 'title' => 'CEK TAGIHAN', 'desc' => 'Periksa tagihan air Anda secara online dengan mudah dan cepat.'],
                        ['icon' => 'droplet', 'title' => 'HITUNG TARIF', 'desc' => 'Simulasikan biaya pemakaian air berdasarkan jumlah penggunaan bulanan.'],
                        ['icon' => 'activity', 'title' => 'SIMULASI HARGA', 'desc' => 'Hitung perkiraan total biaya air berdasarkan golongan pelanggan dan jumlah pemakaian.'],
                    ];
                @endphp

                @foreach ($infos as $info)
                    <div class="p-8 bg-white rounded-2xl shadow-md border-t-4 border-blue-500 hover:shadow-xl hover:-translate-y-1 transition transform">
                        <div class="flex justify-center mb-4">
                            <i data-feather="{{ $info['icon'] }}" class="text-black" width="40" height="40"></i>
                        </div>
                        <h3 class="font-bold text-black text-lg mb-2 tracking-wide">{{ $info['title'] }}</h3>
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $info['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

   <!-- 🔹 Headline News -->
<div class="bg-[#fff8d6] shadow-inner">
    <section class="py-16 max-w-7xl mx-auto px-6">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-black border-b-4 border-[#004d93] inline-block pb-2">
                HEADLINE NEWS
            </h2>
        </div>

        @if ($beritas->count() > 0)
            <div class="grid md:grid-cols-2 gap-8">
                @foreach ($beritas as $berita)
                    <article class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition">
                        
                        @if($berita->gambar)
                            <div class="overflow-hidden rounded-lg mb-4 border-2 border-[#fcd34d]/40">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" 
                                     alt="{{ $berita->judul }}" 
                                     class="w-full h-56 object-cover hover:scale-105 transition duration-300">
                            </div>
                        @endif
                        
                        <h3 class="font-bold text-lg text-[#004d93] mb-2 hover:text-[#fcd34d] transition">
                            <a href="{{ route('berita.show', $berita) }}">{{ $berita->judul }}</a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-2">
                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                        </p>
                        <p class="text-gray-700 text-sm leading-relaxed mb-4">
                            {!! Str::limit(strip_tags($berita->isi), 150, '...') !!}
                        </p>
                        <a href="{{ route('berita.show', $berita) }}" class="text-[#015b97] text-sm font-semibold hover:text-[#fcd34d] transition">
                            Selengkapnya →
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600 mt-6">Belum ada berita yang tersedia.</p>
        @endif

        <div class="text-center mt-10">
            <a href="{{ route('berita.index') }}" class="bg-[#015b97] hover:bg-[#004d93] text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:text-[#fcd34d] transition">
                Lihat Berita Lainnya
            </a>
        </div>
    </section>
</div>


        <!-- 🔹 Partner Section -->
        <section class="py-16 border-t bg-yellow-50 shadow-inner">
            <div class="max-w-6xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-black uppercase tracking-wide mb-3">PARTNER</h2>
                <div class="flex justify-center mb-10">
                    <span class="block w-24 h-[3px] bg-[#004d93] rounded-full"></span>
                </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-8 justify-center items-center mb-12">
                        @foreach ($partners as $partner)
                            <a href="{{ $partner->link ?? '#' }}" target="_blank" class="group flex items-center justify-center">
                                <div class="w-20 h-20 rounded-full overflow-hidden shadow-md hover:shadow-lg transition duration-300 flex items-center justify-center">
                                    @if($partner->logo)
                                        <img src="{{ asset('storage/' . $partner->logo) }}" 
                                            alt="{{ $partner->nama }}"
                                            class="w-16 h-16 object-cover rounded-full transition duration-300 group-hover:scale-105">
                                    @else
                                        <span class="text-gray-500 text-sm">{{ $partner->nama }}</span>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                <a href="{{ route('partner.user') }}" class="inline-block bg-[#004d93] hover:bg-[#015b97] text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:text-[#fcd34d] transition">
                    Lihat Partner Lainnya
                </a>
            </div>
        </section>

        <div class="w-full h-[4px] bg-yellow-500"></div>

        <!-- 🔹 Footer -->
        <footer class="bg-[#004d93] text-white shadow-inner">
            <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">

                <!-- 🏢 Tentang -->
                <div>
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('storage/logo.png') }}" 
                             alt="Logo Perumdam Tirta Mukti" 
                             class="h-16 w-auto mx-auto md:mx-0">
                        <h3 class="text-lg font-semibold leading-tight ml-3">
                            Perumdam Tirta Mukti
                        </h3>
                    </div>
                    <p class="text-gray-200 text-sm leading-relaxed mb-4">
                        Perumdam Tirta Mukti melayani penyediaan air bersih di Kabupaten Bandung, Bandung Barat, dan Kota Cimahi dengan komitmen pelayanan terbaik dan berkelanjutan.
                    </p>
                    <a href="{{ route('tentangkami.index') }}" class="inline-block text-[#fcd34d] hover:text-yellow-300 text-sm font-semibold transition">
                        Selengkapnya →
                    </a>
                </div>

                <!-- 🧭 Navigasi -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 border-b-2 border-[#fcd34d] inline-block pb-1">Navigasi</h4>
                    <ul class="space-y-2 text-gray-200">
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
                        <li>📍 Jl. Raya Soreang No.10, Kab. Bandung</li>
                        <li>📞 (022) 589 3470</li>
                        <li>📧 info@tirta-murti.co.id</li>
                    </ul>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="hover:text-[#fcd34d]"><i class="fab fa-facebook text-2xl"></i></a>
                        <a href="#" class="hover:text-[#fcd34d]"><i class="fab fa-instagram text-2xl"></i></a>
                        <a href="#" class="hover:text-[#fcd34d]"><i class="fab fa-youtube text-2xl"></i></a>
                    </div>
                </div>

            </div>

            <div class="bg-[#00396f] text-center py-3 text-gray-300 text-sm shadow-inner">
                © {{ date('Y') }} Perumda Air Minum Tirta Raharja. Semua hak cipta dilindungi.
            </div>
        </footer>
    </div>
</x-app-layout>

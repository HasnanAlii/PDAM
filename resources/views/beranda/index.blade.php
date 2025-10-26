<x-app-layout>
    <div class="bg-[#f9fafb] min-h-screen">

        <!-- 🔹 Hero Section -->
      <div class="bg-[#fff8d6] shadow-inner">
        <section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">
            <!-- Bagian Kiri -->
            <div>
                <h2 class="text-3xl font-bold text-black mb-4 leading-snug border-l-4 border-[#004d93] pl-4">
                    Perumdam Tirta Mukti
                </h2>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    Perumda Air Minum Tirta Raharja merupakan perusahaan daerah yang bergerak di bidang penyediaan 
                    dan pengelolaan air bersih untuk masyarakat Kabupaten Cianjur.
                    Kami berkomitmen memberikan pelayanan prima melalui sistem distribusi air yang berkualitas, efisien, dan berkelanjutan.
                </p>
                <p class="text-gray-700 mb-6 leading-relaxed">
                    Dengan semangat profesionalisme dan inovasi, Tirta Raharja terus berupaya meningkatkan kepuasan pelanggan 
                    serta mendukung pembangunan daerah melalui pelayanan air minum yang sehat dan terjangkau.
                </p>
            </div>

            <!-- Bagian Kanan (Swiper Slider) -->
            <div class="relative">
                <div class="pb-12">
                    <div class="swiper mySwiper rounded-2xl overflow-hidden shadow-lg border-4 border-[#fcd34d]/40 hover:shadow-xl transition">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/pdam1.jpg') }}" alt="Gambar 1" class="w-full h-80 object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/pdam2.jpeg') }}" alt="Gambar 2" class="w-full h-80 object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/pdam3.png') }}" alt="Gambar 3" class="w-full h-80 object-cover">
                        </div>
                    </div>
                    <!-- Tombol navigasi -->
                    <div class="swiper-button-next"></div>

                    <div class="swiper-button-prev"></div>
                    <!-- Pagination (titik) -->
                    </div>
                    <div class="swiper-pagination"></div>

            </div>
        </section>
    </div>



        <!-- 🔹 Info Cepat -->
    <section class="bg-yellow-50 py-16 shadow-inner">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-6 text-center">
            @php
                $infos = [
                    [
                        'icon' => 'book-open',
                        'title' => 'BERITA',
                        'desc' => 'Lihat berita, kegiatan, dan pengumuman terbaru dari Perumdam Tirta Mukti.',
                        'href' => route('berita.index'),
                    ],
                    [
                        'icon' => 'file-text',
                        'title' => 'CEK TAGIHAN',
                        'desc' => 'Periksa tagihan air Anda secara online dengan mudah dan cepat.',
                        'href' => route('cektagihan.index'),
                    ],
                    [
                        'icon' => 'activity',
                        'title' => 'SIMULASI HARGA',
                        'desc' => 'Hitung perkiraan total biaya air berdasarkan golongan pelanggan dan jumlah pemakaian.',
                        'href' => route('simulasi.index'),
                    ],
                    [
                        'icon' => 'info',
                        'title' => 'TENTANG KAMI',
                        'desc' => 'Lihat profil, visi, dan misi Perumdam Tirta Mukti.',
                        'href' => route('tentangkami.index'),
                    ],
                ];
            @endphp

            @foreach ($infos as $info)
                <a href="{{ $info['href'] }}" 
                class="p-8 bg-white rounded-2xl shadow-md border-t-4 border-blue-500 hover:shadow-xl hover:-translate-y-1 transition transform block">
                    <div class="flex justify-center mb-4">
                        <i data-feather="{{ $info['icon'] }}" class="text-black" width="40" height="40"></i>
                    </div>
                    <h3 class="font-bold text-black text-lg mb-2 tracking-wide">{{ $info['title'] }}</h3>
                    <p class="text-sm text-gray-700 leading-relaxed">{{ $info['desc'] }}</p>
                </a>
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
                                     class="w-full h-96 object-cover hover:scale-105 transition duration-300">
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

    </div>
</x-app-layout>

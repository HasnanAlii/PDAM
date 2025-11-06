




<x-app-layout>
    <div class="bg-[#f9fafb] min-h-screen">

        <!-- 🔹 Hero Section -->
      <div class="bg-[#fff8d6] shadow-inner">
        <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-6 py-12 sm:py-16 grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-10 items-center">
                   <!-- Bagian Kanan (Swiper Slider) -->
            <div class="relative w-full">
                <div class="pb-6 sm:pb-12">
                    <div class="swiper mySwiper rounded-2xl overflow-hidden shadow-lg border-2 sm:border-4 border-[#fcd34d]/40 hover:shadow-xl transition">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/pdam1.jpg') }}" alt="Gambar 1" class="w-full h-64 sm:h-80 object-cover">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/pdam2.jpeg') }}" alt="Gambar 2" class="w-full h-64 sm:h-80 object-cover">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/pdam3.png') }}" alt="Gambar 3" class="w-full h-64 sm:h-80 object-cover">
                            </div>
                        </div>
                        <!-- Tombol navigasi -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- Pagination (titik) -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <!-- Bagian Kiri -->
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-black mb-4 leading-snug border-l-4 border-[#004d93] pl-3 sm:pl-4">
                    Perumdam Tirta Mukti
                </h2>
                <p class="text-gray-700 mb-4 sm:mb-6 text-sm sm:text-base leading-relaxed">
                    Perumda Air Minum Tirta Raharja merupakan perusahaan daerah yang bergerak di bidang penyediaan 
                    dan pengelolaan air bersih untuk masyarakat Kabupaten Cianjur.
                    Kami berkomitmen memberikan pelayanan prima melalui sistem distribusi air yang berkualitas, efisien, dan berkelanjutan.
                </p>
                <p class="text-gray-700 mb-4 sm:mb-6 text-sm sm:text-base leading-relaxed">
                    Dengan semangat profesionalisme dan inovasi, Tirta Raharja terus berupaya meningkatkan kepuasan pelanggan 
                    serta mendukung pembangunan daerah melalui pelayanan air minum yang sehat dan terjangkau.
                </p>
            </div>

     
        </section>
    </div>
        <!-- 🔹 Info Cepat -->
<section class="bg-yellow-50 py-6 sm:py-12 shadow-inner">
    <div class="max-w-7xl mx-auto grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-2 sm:gap-4 md:gap-6 px-4 sm:px-6 text-center">
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
               class="bg-white border border-gray-200 p-4 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center justify-center">
                <i data-feather="{{ $info['icon'] }}" class="w-6 h-6 text-blue-600 mb-2"></i>
                <span class="text-black font-semibold text-sm">{{ $info['title'] }}</span>
            </a>
        @endforeach
    </div>
</section>




<div class="bg-[#fff8d6] py-8 sm:py-12">
    <section class="max-w-7xl mx-auto px-4 sm:px-6">
        <!-- Judul -->
        <div class="text-center mb-8 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-[#004d93] border-b-4 border-[#fcd34d] inline-block pb-1 sm:pb-2 animate-bounce">
                HEADLINE NEWS
            </h2>
        </div>

        @if ($beritas->count() > 0)
            <div class="relative">
                <!-- Garis timeline tengah -->
                <div class="hidden md:block absolute left-1/2 top-0 bottom-0 transform -translate-x-1/2 border-l-2 border-gray-300"></div>

                <div class="space-y-6 sm:space-y-10 pb-8 sm:pb-12">
                    @foreach ($beritas->take(4) as $index => $berita)
                        @php $isLeft = $index % 2 == 0; @endphp
                        <div class="md:flex md:items-center md:justify-between relative">
                            @if($isLeft)
                                <div class="md:w-5/12 md:pr-4 md:text-right">
                                    <div class="bg-yellow-50 p-4 sm:p-5 rounded-xl shadow-md border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition">
                                        <h3 class="font-bold text-base sm:text-lg text-[#004d93] mb-1 hover:text-[#fcd34d] transition">
                                            <a href="{{ route('berita.show', $berita) }}" class="flex items-center justify-end">
                                                <span class="mr-2">📌</span>{{ $berita->judul }}
                                            </a>
                                        </h3>
                                        <p class="text-xs sm:text-sm text-gray-500 mb-1">
                                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                                        </p>
                                        <p class="text-gray-700 text-xs sm:text-sm leading-relaxed mb-2">
                                            {!! Str::limit(strip_tags($berita->isi), 150, '...') !!}
                                        </p>
                                        <a href="{{ route('berita.show', $berita) }}" class="text-[#015b97] text-xs sm:text-sm font-semibold hover:text-[#fcd34d] transition">
                                            Selengkapnya →
                                        </a>
                                    </div>
                                </div>
                                <div class="md:w-5/12"></div>
                            @else
                                <div class="md:w-5/12"></div>
                                <div class="md:w-5/12 md:pl-4 md:text-left">
                                    <div class="bg-yellow-50 p-4 sm:p-5 rounded-xl shadow-md border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition">
                                        <h3 class="font-bold text-base sm:text-lg text-[#004d93] mb-1 hover:text-[#fcd34d] transition">
                                            <a href="{{ route('berita.show', $berita) }}" class="flex items-center">
                                                <span class="mr-2">📌</span>{{ $berita->judul }}
                                            </a>
                                        </h3>
                                        <p class="text-xs sm:text-sm text-gray-500 mb-1">
                                            {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                                        </p>
                                        <p class="text-gray-700 text-xs sm:text-sm leading-relaxed mb-2">
                                            {!! Str::limit(strip_tags($berita->isi), 150, '...') !!}
                                        </p>
                                        <a href="{{ route('berita.show', $berita) }}" class="text-[#015b97] text-xs sm:text-sm font-semibold hover:text-[#fcd34d] transition">
                                            Selengkapnya →
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <div class="absolute left-1/2 transform -translate-x-1/2 bg-white border-2 border-[#fcd34d]/60 w-4 sm:w-5 h-4 sm:h-5 rounded-full z-10"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center text-gray-600 mt-6 text-sm sm:text-base">Belum ada berita yang tersedia.</p>
        @endif

        <div class="text-center mt-6 sm:mt-12">
            <a href="{{ route('berita.index') }}" class="bg-[#015b97] hover:bg-[#004d93] text-white font-semibold px-6 sm:px-8 py-2 sm:py-3 rounded-xl shadow-lg hover:text-[#fcd34d] transition duration-300">
                Lihat Berita Lainnya
            </a>
        </div>
    </section>
</div>

        <!-- Tailwind Animasi Tambahan -->
        <style>
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.7s forwards;
        }
        </style>

        <!-- 🔹 Partner Section -->
        <section class="py-12 sm:py-16 border-t bg-yellow-50 shadow-inner">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-black uppercase tracking-wide mb-3">PARTNER</h2>
                <div class="flex justify-center mb-6 sm:mb-10">
                    <span class="block w-20 sm:w-24 h-[3px] bg-[#004d93] rounded-full"></span>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 sm:gap-8 justify-center items-center mb-8 sm:mb-12">
                    @foreach ($partners as $partner)
                        <a href="{{ $partner->link ?? '#' }}" target="_blank" class="group flex items-center justify-center">
                            <div class="w-16 sm:w-20 h-16 sm:h-20 rounded-full overflow-hidden shadow-md hover:shadow-lg transition duration-300 flex items-center justify-center">
                                @if($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}" 
                                        alt="{{ $partner->nama }}"
                                        class="w-12 sm:w-16 h-12 sm:h-16 object-cover rounded-full transition duration-300 group-hover:scale-105">
                                @else
                                    <span class="text-gray-500 text-xs sm:text-sm">{{ $partner->nama }}</span>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
                <a href="{{ route('beranda.partner') }}" class="inline-block bg-[#004d93] hover:bg-[#015b97] text-white font-semibold px-6 sm:px-8 py-2 sm:py-3 rounded-lg shadow-md hover:text-[#fcd34d] transition">
                    Lihat Partner Lainnya
                </a>
            </div>
        </section>

        <div class="w-full h-1 sm:h-1.5 bg-yellow-500"></div>

    </div>
</x-app-layout>


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
                                 <a href="{{ route('galeri.detail', $gallery->id) }}" 
                                    class="bg-[#fcd34d] text-[#004d93] px-4 py-2 rounded-md font-semibold shadow hover:bg-[#fcd34d]/80 transition">
                                    Lihat Detail
                                    </a>
                                </div>
                            </div>

                            {{-- <div class="p-4 text-center">
                                <h3 class="text-lg font-semibold text-[#004d93]">{{ $gallery->judul }}</h3>
                            </div> --}}
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $galleries->links() }}
                </div>
            @endif
        </section>


</x-app-layout>

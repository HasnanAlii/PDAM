<x-app-layout>
    <div class="bg-[#fff8d6] min-h-screen">

        <!-- 🔹 Header -->
        <section class="bg-yellow-50 py-6 shadow-md border-b border-[#fcd34d]">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold text-[#004d93] tracking-wide">Detail Galeri</h1>
                <a href="{{ route('galeri.index') }}" class="bg-[#fcd34d] text-[#004d93] px-4 py-2 rounded-md font-semibold shadow hover:bg-[#fcd34d]/80 transition">
                    Kembali
                </a>
            </div>
        </section>

        <!-- 🔹 Konten Galeri -->
        <section class="max-w-4xl mx-auto px-6 py-12">
            <div class="bg-yellow-50 rounded-xl shadow-md border border-[#fcd34d]/40 overflow-hidden">
                <!-- Gambar Responsif -->
                <div class="w-full flex justify-center p-4">
                    <img src="{{ asset('storage/' . $gallery->gambar) }}" 
                         alt="{{ $gallery->judul }}" 
                         class="w-full h-auto max-h-[90vh] object-contain rounded-lg shadow">
                </div>

                <!-- Judul & Deskripsi -->
                <div class="p-6 text-center">
                    <h2 class="text-2xl font-bold text-[#004d93] mb-4">{{ $gallery->judul }}</h2>
                    <p class="text-gray-700 text-sm">{{ $gallery->deskripsi }}</p>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>

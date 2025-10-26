<x-app-layout>
    <div class="bg-[#fff8d6] min-h-screen">

        <!-- Header Berita -->
        <section class="bg-yellow-50 py-10 shadow-md border-b border-[#fcd34d]">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h1 class="text-3xl font-bold text-[#004d93] mb-2">{{ $berita->judul }}</h1>
                <p class="text-sm text-gray-600">
                    Ditulis oleh <span class="font-medium text-[#004d93]">{{ $berita->penulis }}</span>
                    pada {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
                    | Kategori: <span class="text-blue-600 font-semibold">{{ $berita->kategori }}</span>
                </p>
            </div>
        </section>

        <!-- Konten Berita -->
        <div class="max-w-4xl mx-auto px-6 py-12">
            @if($berita->gambar)
                <div class="overflow-hidden rounded-lg mb-6 border-2 border-[#fcd34d]/40">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" 
                         class="w-full  object-cover" 
                         alt="{{ $berita->judul }}">
                </div>
            @endif

            <div class="text-gray-700 text-lg leading-relaxed">
                {!! $berita->isi !!}
            </div>

            <a href="{{ route('berita.index') }}" 
               class="inline-block mt-8 bg-[#004d93] text-white px-5 py-2 rounded-lg hover:bg-[#003b72] transition">
               ← Kembali ke Berita
            </a>
        </div>

    </div>
</x-app-layout>

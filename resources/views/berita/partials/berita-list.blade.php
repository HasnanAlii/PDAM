@forelse ($beritas as $berita)
    <article class="bg-yellow-50 p-6 rounded-xl shadow border border-yellow-100 hover:shadow-lg transition mb-6">
        @if ($berita->gambar)
            <div class="overflow-hidden rounded-lg mb-4 border-2 border-[#fcd34d]/40">
                <img src="{{ asset('storage/' . $berita->gambar) }}" 
                     class="w-full object-cover hover:scale-105 transition duration-300" 
                     alt="{{ $berita->judul }}">
            </div>
        @endif
        <h2 class="text-2xl font-bold text-[#004d93] mb-2 hover:underline">
            <a href="{{ route('berita.show', $berita) }}">{{ $berita->judul }}</a>
        </h2>
        <p class="text-sm text-gray-600 mb-3">
            Ditulis oleh <span class="font-medium text-[#004d93]">{{ $berita->penulis }}</span>
            pada {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d M Y') }}
        </p>
        <div class="text-gray-700 text-base leading-relaxed mb-5">
            {!! Str::limit(strip_tags($berita->isi), 300, '...') !!}
        </div>
        {{-- <span class="text-sm text-blue-600 font-semibold">#{{ $berita->kategori }}</span> --}}
        <a href="{{ route('user.berita.show', $berita) }}" 
           class="inline-block bg-[#004d93] text-white px-5 py-2 rounded-lg hover:bg-[#003b72] transition mt-3">
            Baca Selengkapnya →
        </a>
    </article>
@empty
    <p class="text-center text-gray-600">Belum ada berita pada kategori ini.</p>
@endforelse

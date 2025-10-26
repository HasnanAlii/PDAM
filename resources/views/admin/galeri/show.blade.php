<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-800 leading-tight">
            🖼️ Detail Gambar Galeri
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10 px-6">
        <div class="bg-white rounded-xl shadow-md p-6 border border-blue-100">
            <!-- Judul -->
            <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $galeri->judul }}</h3>

            <!-- Gambar -->
            @if ($galeri->gambar)
                <div class="overflow-hidden rounded-xl shadow-sm mb-6">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}"
                         alt="{{ $galeri->judul }}"
                         class="w-full  object-cover rounded-xl border border-blue-100">
                </div>
            @endif

            <!-- Deskripsi -->
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($galeri->deskripsi)) !!}
            </div>

            <!-- Tombol kembali -->
            <div class="mt-8">
                <a href="{{ route('admin.galeri.index') }}"
                   class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    <x-lucide-arrow-left class="w-4 h-4 mr-2" /> Kembali ke Galeri
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
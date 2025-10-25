<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-800 leading-tight flex items-center gap-2">
            <x-lucide-image class="w-6 h-6 text-blue-700" />
            Detail Galeri
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10 px-6">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-md p-8 border border-blue-100">
            
            <!-- Judul -->
            <h3 class="text-3xl font-bold text-gray-800 mb-6">{{ $galeri->judul }}</h3>

            <!-- Gambar -->
            @if ($galeri->gambar)
                <div class="overflow-hidden rounded-xl shadow-md mb-6">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" 
                         alt="{{ $galeri->judul }}"
                         class="w-full h-[420px] object-cover rounded-xl border border-blue-100">
                </div>
            @else
                <div class="bg-gray-100 text-gray-500 rounded-lg py-16 text-center mb-6">
                    <x-lucide-image-off class="w-10 h-10 mx-auto mb-3" />
                    Tidak ada gambar
                </div>
            @endif

            <!-- Deskripsi -->
            <div class="text-gray-700 leading-relaxed text-justify mb-8">
                {!! nl2br(e($galeri->deskripsi)) !!}
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center justify-between mt-8">
                <a href="{{ route('admin.galeri.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                    <x-lucide-arrow-left class="w-4 h-4" /> Kembali
                </a>

                <div class="flex gap-2">
                    <a href="{{ route('galeri.edit', $galeri->id) }}"
                       class="inline-flex items-center gap-2 bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                        <x-lucide-edit class="w-4 h-4" /> Edit
                    </a>

                    <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                            <x-lucide-trash-2 class="w-4 h-4" /> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

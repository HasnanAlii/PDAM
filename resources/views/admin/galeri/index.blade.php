<x-admin-layout>
    <div class="bg-white p-8 rounded-xl shadow border border-blue-100">
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-800 leading-tight">📸 Manajemen Galeri</h2>
    </x-slot>

       <!-- Menu Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6  mb-6">
            <a href="{{ route('admin.berita.index') }}" 
               class="bg-blue-50 border border-blue-200 p-4 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center justify-center">
                <x-lucide-newspaper class="w-6 h-6 text-blue-700 mb-2" />
                <span class="text-blue-700 font-semibold">Berita</span>
            </a>

            <a href="{{ route('admin.galeri.index') }}" 
               class="bg-green-50 border border-green-200 p-4 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center justify-center">
                <x-lucide-image class="w-6 h-6 text-green-700 mb-2" />
                <span class="text-green-700 font-semibold">Galeri</span>
            </a>

            <a href="{{ route('admin.tentang.index') }}" 
            class="bg-yellow-50 border border-yellow-200 p-4 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center justify-center">
            <x-lucide-info class="w-6 h-6 text-yellow-700 mb-2" />
            <span class="text-yellow-700 font-semibold">Tentang</span>
              </a>
        
            <a href="{{ route('admin.partner.index') }}" 
               class="bg-purple-50 border border-purple-200 p-4 rounded-lg shadow hover:shadow-lg transition flex flex-col items-center justify-center">
                <x-lucide-users class="w-6 h-6 text-purple-700 mb-2" />
                <span class="text-purple-700 font-semibold">Partner</span>
            </a>
        </div>

        <!-- 🔹 Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-blue-800">Manajemen Galeri</h1>
            <a href="{{ route('admin.galeri.create') }}"
               class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition flex items-center gap-2">
                <x-lucide-plus class="w-4 h-4" /> Tambah Gambar
            </a>
        </div>

        <!-- Notifikasi -->
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Grid Galeri -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($galleries as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition transform hover:-translate-y-1">
                    <!-- Gambar -->
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}"
                             alt="{{ $item->judul }}"
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 flex items-center justify-center bg-gray-100 text-gray-400 text-sm">
                            Tidak ada gambar
                        </div>
                    @endif

                    <!-- Konten -->
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800 mb-1">{{ $item->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->deskripsi, 80) }}</p>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-between items-center border-t pt-3 text-sm">
                            <a href="{{ route('admin.galeri.show', $item->id) }}"
                               class="text-blue-600 hover:text-blue-800 font-medium">Lihat</a>

                            <a href="{{ route('admin.galeri.edit', $item->id) }}"
                               class="text-yellow-500 hover:text-yellow-600 font-medium">Edit</a>

                            <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10 text-gray-500">
                    Belum ada data galeri yang tersedia.
                </div>
            @endforelse
        </div>
    </div>
    </div>
</x-admin-layout>

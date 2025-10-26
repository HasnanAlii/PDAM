<x-admin-layout>
    <div class="bg-white p-8 rounded-xl shadow border border-blue-100">

           <!-- Menu Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
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
            <h1 class="text-2xl font-bold text-blue-800">Kelola Tentang Kami</h1>
            <a href="{{ route('admin.tentang.create') }}"
               class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition flex items-center gap-2">
                <x-lucide-plus class="w-4 h-4" /> Tambah Tentang Kami
            </a>
        </div>

        <!-- 🔹 Tabel Tentang Kami -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-blue-100 rounded-lg overflow-hidden">
                <thead class="bg-blue-50 text-blue-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Judul</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Profil</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Visi</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Misi</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Gambar</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($tentang as $index => $item)
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-3 border-b">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 border-b font-medium">{{ $item->judul }}</td>
                            <td class="px-6 py-3 border-b">{{ Str::limit($item->profil, 50) }}</td>
                            <td class="px-6 py-3 border-b">{{ Str::limit($item->visi, 50) }}</td>
                            <td class="px-6 py-3 border-b">{{ Str::limit($item->misi, 50) }}</td>
                            <td class="px-6 py-3 border-b">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-20 h-12 object-contain rounded-md shadow-sm">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 border-b text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.tentang.edit', $item->id) }}"
                                       class="text-blue-700 hover:text-blue-900 flex items-center gap-1">
                                        <x-lucide-edit class="w-4 h-4" /> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.tentang.destroy', $item->id) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800 flex items-center gap-1">
                                            <x-lucide-trash class="w-4 h-4" /> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data Tentang Kami.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- 🔹 Pagination -->
        <div class="mt-6">
            {{ $tentang->links() }}
        </div>
    </div>
</x-admin-layout>

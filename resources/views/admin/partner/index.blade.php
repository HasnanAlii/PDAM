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
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-blue-800">Manajemen Partner</h1>
            <a href="{{ route('admin.partner.create') }}" 
               class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600 flex items-center gap-2">
                <x-lucide-plus class="w-4 h-4" /> Tambah Partner
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-blue-100 rounded-lg overflow-hidden">
                <thead class="bg-blue-50 text-blue-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Logo</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Link</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($partners as $partner)
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-3 border-b">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 border-b">{{ $partner->nama }}</td>
                            <td class="px-6 py-3 border-b">
                                @if($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}" class="w-20 h-12 object-contain">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-3 border-b">
                                @if($partner->link)
                                    <a href="{{ $partner->link }}" target="_blank" class="text-blue-700 hover:underline">
                                        {{ $partner->link }}
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-3 border-b text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.partner.edit', $partner->id) }}" class="text-blue-700 hover:text-blue-900 flex items-center gap-1">
                                        <x-lucide-edit class="w-4 h-4" /> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.partner.destroy', $partner->id) }}" onsubmit="return confirm('Yakin ingin menghapus partner ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 flex items-center gap-1">
                                            <x-lucide-trash class="w-4 h-4" /> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada partner.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $partners->links() }}
        </div>
    </div>
</x-admin-layout>

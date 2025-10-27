<x-admin-layout>
    <div class="bg-white p-8 rounded-xl shadow border border-blue-100">

        <!-- 🔹 Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-blue-800">Kelola Data Simulasi PDAM</h1>
            <a href="{{ route('admin.simulasi.create') }}"
               class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition flex items-center gap-2">
                <x-lucide-plus class="w-4 h-4" /> Tambah Data
            </a>
        </div>

        <!-- 🔹 Tabel Simulasi -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-blue-100 rounded-lg overflow-hidden">
                <thead class="bg-blue-50 text-blue-800">
                    <tr>
                        <th class="px-6 py-3 text-center text-sm font-semibold border-b">No</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold border-b">Golongan</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold border-b">Tarif 0–10 m³</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold border-b">Tarif 11–20 m³</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold border-b">Tarif >20 m³</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold border-b">Biaya Admin</th>
                        <th class="px-6 py-3 text-center text-sm font-semibold border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($simulasis as $index => $s)
                        <tr class="hover:bg-blue-50">
                            <td class="px-6 py-3 border-b text-center">{{ $index + 1 }}</td>
                            <td class="px-6 py-3 border-b font-medium">{{ $s->golongan }}</td>
                            <td class="px-6 py-3 border-b text-center">Rp {{ number_format($s->tarif_0_10, 0, ',', '.') }}</td>
                            <td class="px-6 py-3 border-b text-center">Rp {{ number_format($s->tarif_11_20, 0, ',', '.') }}</td>
                            <td class="px-6 py-3 border-b text-center">Rp {{ number_format($s->tarif_21, 0, ',', '.') }}</td>
                            <td class="px-6 py-3 border-b text-center">Rp {{ number_format($s->biaya_admin, 0, ',', '.') }}</td>
                            <td class="px-6 py-3 border-b text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('admin.simulasi.edit', $s->id) }}"
                                       class="text-blue-600 hover:text-yellow-800 flex items-center gap-1">
                                        <x-lucide-edit class="w-4 h-4" /> Edit
                                    </a>
                                    <form action="{{ route('admin.simulasi.destroy', $s->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline-block">
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
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500 italic">
                                Belum ada data simulasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- 🔹 Pagination (jika ada) -->
        
    </div>
</x-admin-layout>

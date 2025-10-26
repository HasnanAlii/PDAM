<x-admin-layout>
    <div class="p-6">
        <!-- 🔹 Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-blue-800">Kelola Data Simulasi PDAM</h1>
            <a href="{{ route('admin.simulasi.create') }}"
               class="flex items-center gap-2 bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                <x-lucide-plus class="w-4 h-4" />
                Tambah Data
            </a>
        </div>

        <!-- 🔹 Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-blue-50 text-blue-800">
                    <tr>
                        <th class="px-4 py-2 border text-center">#</th>
                        <th class="px-4 py-2 border text-left">Golongan</th>
                        <th class="px-4 py-2 border text-center">Tarif 0–10 m³</th>
                        <th class="px-4 py-2 border text-center">Tarif 11–20 m³</th>
                        <th class="px-4 py-2 border text-center">Tarif >20 m³</th>
                        <th class="px-4 py-2 border text-center">Biaya Admin</th>
                        <th class="px-4 py-2 border text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($simulasis as $index => $s)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $s->golongan }}</td>
                            <td class="px-4 py-2 text-center">Rp {{ number_format($s->tarif_0_10, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-center">Rp {{ number_format($s->tarif_11_20, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-center">Rp {{ number_format($s->tarif_21, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-center">Rp {{ number_format($s->biaya_admin, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.simulasi.edit', $s->id) }}"
                                       class="flex items-center gap-1 bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition">
                                        <x-lucide-pencil class="w-4 h-4" /> Edit
                                    </a>
                                    <form action="{{ route('admin.simulasi.destroy', $s->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="flex items-center gap-1 bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                            <x-lucide-trash class="w-4 h-4" /> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500 italic">
                                Belum ada data simulasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>

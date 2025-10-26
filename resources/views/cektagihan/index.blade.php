<x-app-layout>
    <div class="bg-[#fff8d6] min-h-screen">

        <!-- 🔹 Judul Halaman -->
        <section class="bg-yellow-50 py-10 shadow-md border-b border-[#fcd34d]">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="text-3xl font-bold text-[#004d93] uppercase tracking-wide"> Cek Tagihan Pelanggan</h1>
                <p class="text-sm mt-2 text-gray-700">Masukkan nomor pelanggan untuk melihat tagihan terbaru</p>
            </div>
        </section>

        <!-- 🔹 Form & Hasil Tagihan -->
        <section class="max-w-7xl mx-auto px-6 py-12 space-y-6">

            <!-- Form Cek Tagihan -->
       <div class="bg-yellow-50 rounded-xl shadow-md p-8 border border-[#fcd34d]">
        <form action="{{ route('cektagihan.cek') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col md:flex-row md:items-end md:space-x-4">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Pelanggan</label>
                    <input type="text" name="nomor_pelanggan" value="{{ old('nomor_pelanggan', $nomorPelanggan ?? '') }}"
                        class="w-full border border-[#fcd34d]/50 rounded-lg px-4 py-2 focus:ring-[#004d93] focus:border-[#004d93]"
                        placeholder="Masukkan nomor pelanggan..." required>
                </div>
                <div class="mt-4 md:mt-0 flex-shrink-0">
                    <button type="submit"
                            class="w-full md:w-auto bg-[#004d93] text-white px-6 py-2 mb-0.5 rounded-lg shadow hover:bg-[#003b72] transition duration-200">
                        Cek Tagihan
                    </button>
                </div>
            </div>
        </form>
    </div>

            <!-- Hasil Tagihan -->
            @isset($data)
                <div class="bg-yellow-50 rounded-xl shadow-md p-6 border border-[#fcd34d] overflow-x-auto">
                    <h2 class="text-lg font-semibold text-[#004d93] mb-4">Hasil Tagihan: {{ $nomorPelanggan }}</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 text-gray-700">
                        <div><strong>Nama:</strong> {{ $data['nama'] ?? '-' }}</div>
                        <div><strong>Status:</strong> {{ $data['status'] ?? '-' }}</div>
                        <div><strong>Cabang:</strong> {{ $data['cabang'] ?? '-' }}</div>
                        <div><strong>Golongan:</strong> {{ $data['golongan'] ?? '-' }}</div>
                    </div>

                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-[#004d93] text-white">
                            <tr>
                                <th class="px-4 py-2 border">Bulan-Tahun</th>
                                <th class="px-4 py-2 border">Stand Awal</th>
                                <th class="px-4 py-2 border">Stand Akhir</th>
                                <th class="px-4 py-2 border">M³</th>
                                <th class="px-4 py-2 border">Air</th>
                                <th class="px-4 py-2 border">Biaya Pemeliharaan</th>
                                <th class="px-4 py-2 border">Denda</th>
                                <th class="px-4 py-2 border">Materai</th>
                                <th class="px-4 py-2 border">Besar Cicilan</th>
                                <th class="px-4 py-2 border">Cicilan Ke</th>
                                <th class="px-4 py-2 border">Total</th>
                                <th class="px-4 py-2 border">Status Bayar</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @forelse($data['tagihan'] ?? [] as $tagihan)
                                <tr class="border-b hover:bg-[#fcd34d]/20 transition">
                                    <td class="px-2 py-1 border">{{ $tagihan['bulan_tahun'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['stand_awal'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['stand_akhir'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['m3'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['air'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['biaya_pemeliharaan'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['denda'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['materai'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['besar_cicilan'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['cicilan_ke'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['total'] }}</td>
                                    <td class="px-2 py-1 border">{{ $tagihan['status_bayar'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center px-4 py-2 text-gray-500">Belum ada tagihan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4 text-gray-500 text-sm">
                        <p>1. Jika sudah melakukan pembayaran hari ini, silahkan cek kembali tagihan besok.</p>
                        <p>2. Jika "tidak ada tagihan", kemungkinan besar tagihan sudah lunas.</p>
                        <p>3. Jika tagihan lebih dari 8 bulan belum dibayar, silahkan datang ke kantor cabang terkait.</p>
                    </div>
                </div>
            @endisset
        </section>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="bg-[#fff8d6] min-h-screen">
        <section class="relative bg-yellow-50 py-10 pb-16 shadow-md border-b border-[#fcd34d] overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
            
            <div class="relative max-w-7xl mx-auto px-6 text-center z-10">
                 <h1 class="text-3xl font-bold text-[#004d93] uppercase tracking-wide">
                    Cek Tagihan Pelanggan
                </h1>
                {{-- <div class="w-24 h-1 bg-[#fcd34d] mx-auto rounded-full mb-4"></div> --}}
                 <p class="text-sm mt-2 text-gray-700">
                    Pantau tagihan air Anda dengan mudah dan cepat. Masukkan nomor pelanggan untuk melihat rincian terbaru.
                </p>
            </div>
        </section>
        

        <div class="max-w-7xl mx-auto px-6 -mt-10 pb-20">

            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-10 border border-gray-100 relative z-20 max-w-4xl mx-auto">
                <form action="{{ route('cektagihan.cek') }}" method="POST">
                    @csrf
                    <div class="flex flex-col md:flex-row gap-4 items-end">
                        <div class="flex-1 w-full">
                            <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Nomor Pelanggan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                                    </svg>
                                </div>
                                <input type="text" name="nomor_pelanggan_rel" value="{{ old('nomor_pelanggan_rel', $nomorPelanggan ?? '') }}"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#004d93]/50 focus:border-[#004d93] transition duration-200 shadow-sm text-gray-800 placeholder-gray-400"
                                    placeholder="Masukan Nomor Pelanggan disini" required>
                            </div>
                        </div>
                        <button type="submit"
                                class="w-full md:w-auto bg-[#fcd34d] text-[#004d93] font-bold px-8 py-3 rounded-xl shadow-md hover:bg-[#fbbf24] hover:shadow-lg transition-all duration-200 transform active:scale-95 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Cek Tagihan
                        </button>
                    </div>
                </form>
            </div>


            @isset($data)
            <div class="mt-12 animate-fade-in-up"> <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-t-4 border-[#004d93]">
                
                <div class="p-6 md:p-8 bg-gradient-to-b from-blue-50 to-white">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-[#004d93]">Hasil Pencarian</h2>
                            <p class="text-sm text-gray-500 mt-1">Nomor Pelanggan: <span class="font-mono font-bold text-gray-800 text-lg">{{ $nomorPelanggan }}</span></p>
                        </div>
                      @php
                        $golonganNames = [
                            '1'  => 'Rumah Tangga (R1)',
                            '2'  => 'Instansi Pemerintahan (P2)',
                            '3'  => 'Abri',
                            '4'  => 'Niaga Kecil (N1)',
                            '5'  => 'Niaga Besar (N3)',
                            '6'  => 'Industri Kecil (I2)',
                            '7'  => 'Industri Besar (I1)',
                            '8'  => 'Sosial Umum (S1)',
                            '9'  => 'Rumah Tangga (R2)',
                            '11' => 'Rumah Tangga (R3)',
                            '12' => 'Rumah Tangga (R4)',
                            '13' => 'Sekolah (P1)',
                            '14' => 'Niaga Menengah (N2) - Villa',
                            '15' => 'Sosial Khusus (S2)',
                            '51' => 'RT Sangat Sederhana / MBR (S3)',
                            '16' => 'Non Komersil (K1)',
                            '17' => 'Komersil (K2)',
                        ];

                        $kodeGol = $pelanggan['kode_tarif_rel'] ?? null;
                        $namaGol = $golonganNames[$kodeGol] ?? 'Golongan Tidak Ditemukan';
                    @endphp

                    <div class="mt-3 md:mt-0">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold bg-[#004d93] text-white shadow-sm">
                            {{ $namaGol }}
                        </span>
                    </div>

                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-white p-6 rounded-xl border border-blue-100 shadow-sm">
                        <div class="flex flex-col">
                            <span class="text-xs uppercase tracking-wider text-gray-400 font-semibold mb-1">Nama Pelanggan</span>
                            <span class="text-lg font-bold text-gray-800">{{ $pelanggan['nama_langganan'] ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs uppercase tracking-wider text-gray-400 font-semibold mb-1">Nomor Pelanggan</span>
                            <span class="text-lg font-bold text-gray-800">{{ $pelanggan['nomor_langganan'] ?? '-' }}</span>
                        </div>
                        <div class="flex flex-col md:col-span-3 lg:col-span-1">
                            <span class="text-xs uppercase tracking-wider text-gray-400 font-semibold mb-1">Alamat</span>
                            <span class="text-base font-medium text-gray-800 truncate" title="{{ $pelanggan['alamat'] ?? '-' }}">{{ $pelanggan['alamat'] ?? '-' }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-600 uppercase tracking-wider font-semibold border-y border-gray-200">
                            <tr>
                                <th class="px-6 py-4 whitespace-nowrap">Periode</th>
                                <th class="px-6 py-4 text-center whitespace-nowrap">Meter (Awal-Akhir)</th>
                                <th class="px-6 py-4 text-center whitespace-nowrap">Pakai (M³)</th>
                                <th class="px-6 py-4 text-right whitespace-nowrap">Rincian (Rp)</th>
                                <th class="px-6 py-4 text-right whitespace-nowrap">Total Tagihan</th>
                                <th class="px-6 py-4 text-center whitespace-nowrap">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($data as $item)
                            <tr class="hover:bg-blue-50/40 transition duration-150 group">
                                <td class="px-6 py-4 font-medium text-[#004d93]">
                                    {{ \Carbon\Carbon::createFromDate($item['thn_tagih'], $item['bln_tagih'], 1)->translatedFormat('F Y') }}
                                </td>
                                
                                <td class="px-6 py-4 text-center text-gray-500">
                                                    <span class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $item['stand_lalu'] }}</span>
                                                    <span class="mx-1 text-gray-300">➜</span>
                                                    <span class="bg-gray-100 px-2 py-1 rounded text-xs font-semibold text-gray-700">{{ $item['stand_akhir'] }}</span>
                                                </td>
                                                
                                                <td class="px-6 py-4 text-center">
                                                    <span class="font-bold text-gray-800">{{ $item['pemakaian'] }}</span>
                                                </td>
                                                
                                                <td class="px-6 py-4 text-right text-gray-500 text-xs">
                                                    <div class="flex flex-col gap-0.5">
                                                        <span>Denda: <span class="font-medium">{{ number_format($item['denda_rek']) }}</span></span>
                                                        <span>Adm: <span class="font-medium">{{ number_format($item['materai']) }}</span></span>
                                                    </div>
                                                </td>
                                                
                                                <td class="px-6 py-4 text-right">
                                                    <span class="text-base font-bold text-[#004d93]">
                                                        Rp {{ number_format($item['totaltagihan'], 0, ',', '.') }}
                                                    </span>
                                                </td>
                                            

                                                <td class="px-6 py-4 text-center">
                                                    @if($item['tgl_bayar_rek'] == null)
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-100">
                                                            Belum Bayar
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-700 border border-green-200">
                                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                            Lunas
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="px-6 py-16 text-center text-gray-500">
                                                    <div class="flex flex-col items-center justify-center opacity-60">
                                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                        <p class="text-lg font-medium">Tidak ada data tagihan ditemukan.</p>
                                                        <p class="text-sm text-gray-400 mt-1">Pastikan nomor pelanggan sudah benar.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-gray-500 text-sm">
                        <p>1. Jika sudah melakukan pembayaran hari ini, silahkan cek kembali tagihan besok.</p>
                        <p>2. Jika "tidak ada tagihan", kemungkinan besar tagihan sudah lunas.</p>
                        <p>3. Jika tagihan lebih dari 8 bulan belum dibayar, silahkan datang ke kantor cabang terkait.</p>
                    </div>

                    @endisset
                </div>
            </div>
    
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
        }
    </style>
</x-app-layout>

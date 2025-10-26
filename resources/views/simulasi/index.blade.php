<x-app-layout>
    <div class="bg-[#fff8d6] min-h-screen">

        <!-- 🔹 Judul Halaman -->
        <section class="bg-yellow-50 py-10 shadow-md border-b border-[#fcd34d]">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="text-3xl font-bold text-[#004d93] uppercase tracking-wide">
                    Simulasi Perhitungan Tagihan PDAM
                </h1>
                <p class="text-sm mt-2 text-gray-700">
                    Hitung perkiraan tagihan air berdasarkan golongan pelanggan dan pemakaian bulanan.
                </p>
            </div>
        </section>

        <!-- 🔹 Form Simulasi -->
        <section class="max-w-3xl mx-auto px-6 py-12">
            <div class="bg-yellow-50 p-8 rounded-xl shadow-md border border-[#fcd34d]">
                <form action="{{ route('simulasi.hitung') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Golongan -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Golongan Pelanggan</label>
                        <select name="golongan"
                                class="w-full border border-[#fcd34d]/50 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#004d93] focus:border-[#004d93]"
                                required>
                            <option value="">-- Pilih Golongan --</option>
                            @foreach($golongan as $g)
                                <option value="{{ $g }}" {{ old('golongan') == $g ? 'selected' : '' }}>
                                    {{ $g }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pemakaian Air -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Pemakaian Air (m³)</label>
                        <input type="number"
                               name="pemakaian_air"
                               min="0"
                               value="{{ old('pemakaian_air') }}"
                               class="w-full border border-[#fcd34d]/50 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#004d93] focus:border-[#004d93]"
                               required>
                    </div>

                    <!-- Tombol -->
                    <div class="text-center">
                        <button type="submit"
                                class="bg-[#004d93] text-white px-8 py-3 rounded-lg font-semibold hover:bg-[#003b73] transition duration-300 shadow-md">
                            Hitung Tagihan
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- 🔹 Hasil Perhitungan -->
        @isset($hasil)
            <section class="max-w-3xl mx-auto px-6 pb-16">
                <div class="bg-yellow-50 border border-[#fcd34d]/60 rounded-xl shadow-md overflow-hidden">

                    <div class="bg-[#fcd34d]/30 text-[#004d93] py-4 px-6 text-center font-bold">
                        Hasil Simulasi Tagihan Air
                    </div>

                    <div class="p-6 overflow-x-auto">
                        <table class="w-full border-collapse">
                            <tbody class="text-gray-700">

                                <tr class="border-b hover:bg-yellow-100 transition">
                                    <td class="py-3 px-4 font-semibold text-[#004d93]">Golongan</td>
                                    <td class="py-3 px-4">{{ $hasil['golongan'] }}</td>
                                </tr>

                                <tr class="border-b hover:bg-yellow-100 transition">
                                    <td class="py-3 px-4 font-semibold text-[#004d93]">Pemakaian</td>
                                    <td class="py-3 px-4">{{ $hasil['pemakaian_air'] }} m³</td>
                                </tr>

                                <!-- Rincian Tarif -->
                                <tr class="border-b hover:bg-yellow-100 transition">
                                    <td class="py-3 px-4 font-semibold text-[#004d93]">Tarif 0–10 m³</td>
                                    <td class="py-3 px-4">
                                        Rp {{ number_format($hasil['tarif_0_10'], 0, ',', '.') }} ×
                                        {{ min(10, $hasil['pemakaian_air']) }} m³
                                    </td>
                                </tr>

                                @if($hasil['pemakaian_air'] > 10)
                                    <tr class="border-b hover:bg-yellow-100 transition">
                                        <td class="py-3 px-4 font-semibold text-[#004d93]">Tarif 11–20 m³</td>
                                        <td class="py-3 px-4">
                                            Rp {{ number_format($hasil['tarif_11_20'], 0, ',', '.') }} ×
                                            {{ min(10, $hasil['pemakaian_air'] - 10) }} m³
                                        </td>
                                    </tr>
                                @endif

                                @if($hasil['pemakaian_air'] > 20)
                                    <tr class="border-b hover:bg-yellow-100 transition">
                                        <td class="py-3 px-4 font-semibold text-[#004d93]">Tarif > 20 m³</td>
                                        <td class="py-3 px-4">
                                            Rp {{ number_format($hasil['tarif_21'], 0, ',', '.') }} ×
                                            {{ $hasil['pemakaian_air'] - 20 }} m³
                                        </td>
                                    </tr>
                                @endif

                                <tr class="border-b hover:bg-yellow-100 transition">
                                    <td class="py-3 px-4 font-semibold text-[#004d93]">Biaya Pemakaian</td>
                                    <td class="py-3 px-4">Rp {{ number_format($hasil['biaya_pemakaian'], 0, ',', '.') }}</td>
                                </tr>

                                <tr class="border-b hover:bg-yellow-100 transition">
                                    <td class="py-3 px-4 font-semibold text-[#004d93]">Biaya Admin</td>
                                    <td class="py-3 px-4">Rp {{ number_format($hasil['biaya_admin'], 0, ',', '.') }}</td>
                                </tr>

                                <tr class="bg-yellow-100 font-bold text-[#004d93] text-lg">
                                    <td class="py-4 px-4 border-t-2 border-[#fcd34d]">Total Tagihan</td>
                                    <td class="py-4 px-4 border-t-2 border-[#fcd34d]">
                                        Rp {{ number_format($hasil['total_tagihan'], 0, ',', '.') }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="bg-yellow-50 text-center py-4">
                        <p class="text-gray-700 text-sm">
                            Simulasi ini hanya bersifat perkiraan dan dapat berbeda dari tagihan sebenarnya.
                        </p>
                    </div>
                </div>
            </section>
        @endisset
    </div>
</x-app-layout>

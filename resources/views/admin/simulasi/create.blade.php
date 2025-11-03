<x-admin-layout>
    <div class="max-w-4xl mx-auto py-10 px-6 mt-40">
        <!-- Notifikasi sukses -->
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Notifikasi error -->
        @if ($errors->any())
            <div class="mb-6 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Tambah Simulasi -->
        <div class="bg-white rounded-xl shadow-md p-8 border border-blue-100">
            <h3 class="text-lg font-semibold text-blue-700 mb-6 border-b pb-2">🧮 Formulir Input Simulasi</h3>

            <form action="{{ route('simulasion.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Golongan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Golongan</label>
                    <input type="text" name="golongan"
                           class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Masukkan nama golongan..." required>
                </div>

                <!-- Tarif dan Biaya -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tarif 0–10 m³</label>
                        <input type="number" name="tarif_0_10"
                               class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Masukkan tarif..." required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tarif 11–20 m³</label>
                        <input type="number" name="tarif_11_20"
                               class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Masukkan tarif..." required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tarif &gt; 20 m³</label>
                        <input type="number" name="tarif_21"
                               class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Masukkan tarif..." required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Biaya Admin</label>
                        <input type="number" name="biaya_admin"
                               class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Masukkan biaya admin..." required>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="pt-4 flex items-center justify-between">
                    <a href="{{ route('simulasion.index') }}" class="text-blue-600 hover:underline">
                        ← Kembali
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

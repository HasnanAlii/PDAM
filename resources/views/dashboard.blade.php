<x-admin-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold text-blue-800 mb-6">Dashboard Admin</h1>
        <p class="text-gray-700 mb-6">Selamat datang di halaman dashboard admin, {{ Auth::user()->name }}!</p>

        <!-- Statistik Card -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-blue-700">Total Berita</h2>
                <p class="text-3xl font-bold text-blue-900 mt-2">{{ $totalBerita }}</p>
            </div>

            <div class="bg-green-50 border border-green-200 p-4 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-green-700">Total Galeri</h2>
                <p class="text-3xl font-bold text-green-900 mt-2">{{ $totalGaleri }}</p>
            </div>

            {{-- Contoh kartu tambahan
            <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-yellow-700">Total Simulasi</h2>
                <p class="text-3xl font-bold text-yellow-900 mt-2">{{ $totalSimulasi }}</p>
            </div> --}}
        </div>
    </div>
</x-admin-layout>

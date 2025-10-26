<x-admin-layout>
    <div class="p-6">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Dashboard Admin</h1>
        <p class="text-gray-700 mb-8">
            Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>! Berikut ringkasan aktivitas dan data terbaru.
        </p>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <!-- Total Berita -->
            <div class="bg-white border border-blue-100 p-6 rounded-xl shadow hover:shadow-lg transition duration-200 flex items-center space-x-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <x-lucide-newspaper class="w-6 h-6 text-blue-700"/>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Berita</p>
                    <p class="text-2xl font-bold text-blue-800 mt-1">{{ $totalBerita }}</p>
                </div>
            </div>

            <!-- Total Galeri -->
            <div class="bg-white border border-green-100 p-6 rounded-xl shadow hover:shadow-lg transition duration-200 flex items-center space-x-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <x-lucide-image class="w-6 h-6 text-green-700"/>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Galeri</p>
                    <p class="text-2xl font-bold text-green-800 mt-1">{{ $totalGaleri }}</p>
                </div>
            </div>

            <!-- Total Partner -->
            <div class="bg-white border border-purple-100 p-6 rounded-xl shadow hover:shadow-lg transition duration-200 flex items-center space-x-4">
                <div class="bg-purple-100 p-3 rounded-full">
                    <x-lucide-users class="w-6 h-6 text-purple-700"/>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Partner</p>
                    <p class="text-2xl font-bold text-purple-800 mt-1">{{ $totalPartner }}</p>
                </div>
            </div>

     

        </div>

        <!-- Aktivitas Terakhir -->
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">📋 Aktivitas Terakhir</h2>
            <div class="bg-white border border-gray-100 p-6 rounded-xl shadow hover:shadow-lg transition duration-200">
                @if($aktivitasTerakhir->isEmpty())
                    <p class="text-gray-500 text-sm">Belum ada aktivitas terbaru.</p>
                @else
                    <ul class="space-y-3">
                        @foreach($aktivitasTerakhir as $aktivitas)
                            <li class="flex justify-between items-center p-2 rounded hover:bg-gray-50 transition">
                                <span class="text-gray-700">
                                    <span class="font-semibold">{{ $aktivitas->jenis }}</span>: {{ $aktivitas->nama }}
                                </span>
                                <span class="text-gray-400 text-xs">{{ $aktivitas->created_at->diffForHumans() }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

    </div>
</x-admin-layout>

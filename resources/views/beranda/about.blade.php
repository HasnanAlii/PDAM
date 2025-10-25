<x-app-layout>
    <div class="bg-[#fff8d6] min-h-screen">

        <!-- 🔹 Judul Halaman -->
        <section class="bg-yellow-50 py-10 shadow-md border-b border-[#fcd34d]">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-blue-800 uppercase tracking-wide">Tentang Kami</h1>
            </div>
        </section>

        <!-- 🔹 Konten Profil, Visi, Misi -->
        <section class="flex justify-center py-12 px-6">
            <div class="bg-yellow-50 rounded-2xl shadow-md p-10 border border-gray-200 max-w-4xl w-full text-center">
                
                @if ($tentangkami && $tentangkami->gambar)
                    <img src="{{ asset('storage/' . $tentangkami->gambar) }}" 
                         alt="{{ $tentangkami->judul }}" 
                         class="rounded-xl shadow-md w-full h-80 object-cover mb-8 mx-auto">
                @endif

                <div class="space-y-8">
                    <div>
                        <h2 class="text-2xl md:text-3xl font-semibold text-blue-700 mb-3">Profil</h2>
                        <p class="text-gray-700 text-lg">{{ $tentangkami->profil ?? 'Belum ada deskripsi.' }}</p>
                    </div>

                    <div>
                        <h2 class="text-2xl md:text-3xl font-semibold text-blue-700 mb-3">Visi</h2>
                        <p class="italic text-gray-600 text-lg">{{ $tentangkami->visi ?? '-' }}</p>
                    </div>

                    <div>
                        <h2 class="text-2xl md:text-3xl font-semibold text-blue-700 mb-3">Misi</h2>
                        <p class="text-gray-700 text-lg whitespace-pre-line">{{ $tentangkami->misi ?? '-' }}</p>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-app-layout>

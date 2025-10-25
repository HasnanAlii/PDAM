<x-app-layout>
    
    <!-- 🔹 Judul Halaman -->
    <section class="bg-yellow-50 py-10 shadow-sm border-b border-blue-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-blue-800 uppercase tracking-wide">PARTNER KAMI</h1>
        </div>
    </section>

    <section class="bg-[#fff8d6] py-16 border-t border-gray-200 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 text-center">
        
            <!-- Jika tidak ada partner -->
            @if($partners->isEmpty())
                <p class="text-gray-600 text-lg">Belum ada data partner yang ditambahkan.</p>
            @else
                <!-- Grid Partner -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-10 items-center justify-items-center">
                    @foreach ($partners as $partner)
                        <a href="{{ $partner->link ?? '#' }}" target="_blank" class="group w-full flex flex-col items-center justify-center">
                            <!-- Card bulat -->
                            <div class="bg-yellow-50 rounded-full shadow-md p-6 hover:shadow-lg transition duration-300 flex items-center justify-center w-32 h-32">
                                <!-- Logo bulat -->
                                @if($partner->logo)
                                    <img 
                                        src="{{ asset('storage/' . $partner->logo) }}" 
                                        alt="{{ $partner->nama }}" 
                                        class="w-20 h-20 object-cover rounded-full mx-auto transition duration-300"
                                    >
                                @else
                                    <span class="text-gray-500 text-sm">{{ $partner->nama }}</span>
                                @endif
                            </div>
                            <p class="font-semibold text-gray-700 group-hover:text-blue-600 transition mt-3 text-sm text-center">
                                {{ $partner->nama }}
                            </p>
                        </a>
                    @endforeach
                </div>
            @endif

        </div>
    </section>
</x-app-layout>

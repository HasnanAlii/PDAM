<nav x-data="{ open: false }" class="bg-white border-gray-100">

    <!-- 🔹 Header -->
<div class="text-white py-6 shadow-lg" style="background-color: #004d93;">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-8">
        
        <!-- 🔹 Logo -->
        <div class="flex-shrink-0">
           <img src="{{ asset('assets/images/logo.png') }}"
            alt="Logo Perumdam Tirta Mukti"
            class="h-24 md:h-40 w-auto">

        </div>

        <!-- 🔹 Teks -->
        <div class="flex-1">
            <h1 class="text-2xl md:text-4xl font-bold tracking-wide text-white">
                Perumdam Tirta Mukti
            </h1>

            <!-- 🔹 Garis pemisah -->
            <div class="w-48 md:w-96 h-[2px] bg-blue-200 my-2 md:my-3"></div>

            <p class="text-sm md:text-lg" style="color: #cce4f7;">
                Jl. Pangeran Hidayatullah No.162, Cianjur, Jawa Barat
            </p>
        </div>
    </div>
</div>


    <!-- 🔹 Navbar Utama -->
    <div class="bg-[#015b97] text-white shadow-md">
    <div class="max-w-7xl mx-auto py-2 flex  space-x-3   px-4   h-12 md:h-auto items-center justify-start md:justify-start">

    <div class="flex-shrink-0 md:hidden"></div>

            <!-- Hamburger Button (Mobile) -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'inline-flex': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> 

            <!-- Menu Desktop -->
            <div class="hidden md:flex space-x-3">
                <x-nav-link href="{{ route('beranda.index') }}" :active="request()->routeIs('beranda.*')" 
                    class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-150 ease-in-out">
                    <i data-feather="home" class="w-5 h-5"></i>
                    <span>BERANDA</span>
                </x-nav-link>

                <x-nav-link href="{{ route('tentangkami.index') }}" :active="request()->routeIs('tentangkami.*')" 
                    class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-150 ease-in-out">
                    <i data-feather="info" class="w-5 h-5"></i>
                    <span>TENTANG KAMI</span>
                </x-nav-link>

                <x-nav-link href="{{ route('berita.index') }}" :active="request()->routeIs('berita.*')" 
                    class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-150 ease-in-out">
                    <i data-feather="file-text" class="w-5 h-5"></i>
                    <span>BERITA</span>
                </x-nav-link>

                <x-nav-link href="{{ route('galeri.index') }}" :active="request()->routeIs('galeri.*')" 
                    class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-150 ease-in-out">
                    <i data-feather="image" class="w-5 h-5"></i>
                    <span>GALERI</span>
                </x-nav-link>

                <x-nav-link href="{{ route('cektagihan.index') }}" :active="request()->routeIs('cektagihan.*')" 
                    class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-150 ease-in-out">
                    <i data-feather="credit-card" class="w-5 h-5"></i>
                    <span>CEK TAGIHAN</span>
                </x-nav-link>

                <x-nav-link href="{{ route('simulasi.index') }}" :active="request()->routeIs('simulasi.*')" 
                    class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-150 ease-in-out">
                    <i data-feather="activity" class="w-5 h-5"></i>
                    <span>SIMULASI</span>
                </x-nav-link>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="md:hidden" x-show="open" @click.away="open = false">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <x-nav-link href="{{ route('beranda.index') }}" :active="request()->routeIs('beranda.*')" class="block px-3 py-2 rounded-md hover:bg-yellow-600">
                    BERANDA
                </x-nav-link>
                <x-nav-link href="{{ route('tentangkami.index') }}" :active="request()->routeIs('tentangkami.*')" class="block px-3 py-2 rounded-md hover:bg-yellow-500">
                    TENTANG KAMI
                </x-nav-link>
                <x-nav-link href="{{ route('berita.index') }}" :active="request()->routeIs('berita.*')" class="block px-3 py-2 rounded-md hover:bg-yellow-600">
                    BERITA
                </x-nav-link>
                <x-nav-link href="{{ route('galeri.index') }}" :active="request()->routeIs('galeri.*')" class="block px-3 py-2 rounded-md hover:bg-yellow-500">
                    GALERI
                </x-nav-link>
                <x-nav-link href="{{ route('cektagihan.index') }}" :active="request()->routeIs('cektagihan.*')" class="block px-3 py-2 rounded-md hover:bg-yellow-500">
                    CEK TAGIHAN
                </x-nav-link>
                <x-nav-link href="{{ route('simulasi.index') }}" :active="request()->routeIs('simulasi.*')" class="block px-3 py-2 rounded-md hover:bg-yellow-500">
                    SIMULASI
                </x-nav-link>
            </div>
        </div>

    </div>
    <div class="w-full h-[4px] bg-yellow-500"></div>

</nav>

<nav x-data="{ open: false }" class="bg-white  border-gray-100">
        <!-- 🔹 Header -->
<div class="text-white py-8 shadow-lg" style="background-color: #004d93;">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center md:items-center md:space-x-8">
        
        <!-- 🔹 Logo -->
        <div class="flex-shrink-0 mb-6 md:mb-0">
            <img src="{{ asset('storage/logo.png') }}" 
                 alt="Logo Perumdam Tirta Mukti" 
                 class="h-40 w-auto mx-auto md:mx-0">
        </div>

        <!-- 🔹 Teks -->
        <div class="flex-1 text-center md:text-left">
            <h1 class="text-4xl font-bold tracking-wide text-white">
                Perumdam Tirta Mukti
            </h1>

            <!-- 🔹 Garis pemisah -->
            <div class="w-96 h-[2px] bg-blue-200 mx-auto md:mx-0 my-3"></div>

            <p class="text-lg" style="color: #cce4f7;">
                Jl. Pangeran Hidayatullah No.162, Cianjur, Jawa Barat
            </p>
        </div>
    </div>
</div>


 
       <!-- 🔹 Navbar Utama -->
<div class="text-white shadow-md" style="background-color: #015b97;">
    <div class="max-w-7xl mx-auto py-2 flex justify-start space-x-3 ">

        <!-- Beranda -->
        <x-nav-link href="{{ route('beranda.index') }}" :active="request()->routeIs('beranda.index')" 
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-150 ease-in-out">
            <i data-feather="home" class="w-5 h-5"></i>
            <span>BERANDA</span>
        </x-nav-link>

        <!-- Tentang Kami -->
        <x-nav-link href="{{ route('tentangkami.index') }}" :active="request()->routeIs('tentangkami.index')" 
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-150 ease-in-out">
            <i data-feather="info" class="w-5 h-5"></i>
            <span>TENTANG KAMI</span>
        </x-nav-link>

        <!-- Berita -->
        <x-nav-link href="{{ route('berita.index') }}" :active="request()->routeIs('berita.index')" 
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-150 ease-in-out">
            <i data-feather="file-text" class="w-5 h-5"></i>
            <span>BERITA</span>
        </x-nav-link>

        <!-- Galeri -->
        <x-nav-link href="{{ route('galeri.index') }}" :active="request()->routeIs('galeri.index')" 
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-150 ease-in-out">
            <i data-feather="image" class="w-5 h-5"></i>
            <span>GALERI</span>
        </x-nav-link>

        <!-- Cek Tagihan -->
        <x-nav-link href="{{ route('cektagihan.index') }}" :active="request()->routeIs('cektagihan.index')" 
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-150 ease-in-out">
            <i data-feather="credit-card" class="w-5 h-5"></i>
            <span>CEK TAGIHAN</span>
        </x-nav-link>

        <!-- Simulasi -->
        <x-nav-link href="{{ route('simulasi.index') }}" :active="request()->routeIs('simulasi.index')" 
            class="flex items-center gap-2 px-4 py-2 rounded-md hover:bg-yellow-500 transition duration-150 ease-in-out">
            <i data-feather="activity" class="w-5 h-5"></i>
            <span>SIMULASI</span>
        </x-nav-link> 
        
    </div> 
    <div class="w-full h-[4px] bg-yellow-500 "></div>
</div>

</nav>

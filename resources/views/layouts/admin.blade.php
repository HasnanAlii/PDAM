<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Dashboard Admin') }}</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/logo.png') }}">


    <!-- Fonts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#f5f8ff]">
    <div class="min-h-screen flex">

        <!-- 🔹 Sidebar -->
        <aside class="w-64 bg-blue-800 text-white flex flex-col shadow-lg">
            <!-- 🔸 Logo -->
            <div class="p-6 text-center border-b border-blue-700">
                <img src="{{ asset('storage/logo.png') }}" 
                     alt="Logo Perumdam Tirta Mukti" 
                     class="h-28 w-auto mx-auto mb-3">
                <h2 class="text-lg font-semibold uppercase tracking-wide">Perundam Tirta Mitra</h2>
            </div>

            <!-- 🔸 Navigasi -->
            <nav class="flex-1 p-4 space-y-1 text-sm">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->routeIs('dashboard') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700 hover:font-semibold' }}">
                    <x-lucide-home class="w-4 h-4 mr-2" /> Dashboard
                </a>

                <a href="{{ route('admin.berita.index') }}"
                    class="flex items-center px-4 py-2 rounded-md transition
                    {{ request()->routeIs('admin.berita.*') ? 'bg-blue-700 font-semibold' : 'hover:bg-blue-700 hover:font-semibold' }}">
                    <x-lucide-settings class="w-4 h-4 mr-2" /> Kelola Beranda
                </a>

                <a href="{{ route('admin.simulasi.index') }}"
                    class="flex items-center px-4 py-2 rounded-md transition
                    {{ request()->routeIs('admin.simulasi.*') ? 'bg-blue-700 font-semibold text-white' : 'hover:bg-blue-700 hover:font-semibold' }}">
                    <x-lucide-droplet class="w-4 h-4 mr-2" /> Kelola Simulasi
                </a>

          
            </nav>

            <!-- 🔸 Logout -->
            <div class="p-4 border-t border-blue-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-blue-700 px-3 py-2 rounded-md hover:bg-blue-600 transition">
                        <x-lucide-log-out class="w-4 h-4" /> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- 🔹 Konten Utama -->
        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</body>
</html>

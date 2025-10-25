<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                {{ __('Beranda') }}
            </x-nav-link>
              <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                {{ __('Tentang Kami') }}
            </x-nav-link>
              <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                {{ __('Berita') }}
            </x-nav-link>
              <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                {{ __('Galeri') }}
            </x-nav-link>
            <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                {{ __('Cek Simulasi') }}
            </x-nav-link>
              <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                {{ __('Simulasi') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

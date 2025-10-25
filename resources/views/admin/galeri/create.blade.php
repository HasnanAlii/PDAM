<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-800 leading-tight">🖼️ Tambah Gambar Galeri</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 px-6">
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

        <!-- Form Tambah Galeri -->
        <div class="bg-white rounded-xl shadow-md p-8 border border-blue-100">
            <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="judul" value="{{ old('judul') }}"
                           class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Masukkan judul gambar..." required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Tuliskan deskripsi singkat...">{{ old('deskripsi') }}</textarea>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                    <input type="file" name="gambar"
                           class="w-full border border-blue-200 rounded-lg px-4 py-2 file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>

                <!-- Tombol Simpan -->
                <div class="pt-4">
                    <a href="{{ route('admin.galeri.index') }}"
                       class=" text-blue-600 hover:underline">
                        ← Kembali
                    </a>
                    <button type="submit"
                            class="ml-2 bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

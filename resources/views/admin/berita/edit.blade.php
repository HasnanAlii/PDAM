<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-blue-800 leading-tight">📰 Edit Berita</h2>
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

        <!-- Form Edit Berita -->
        <div class="bg-white rounded-xl shadow-md p-8 border border-blue-100">
            <form method="POST" action="{{ route('berita.update', $berita->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan judul berita..." required>
                </div>

                <!-- Penulis -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penulis</label>
                    <input type="text" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan nama penulis...">
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="kategori" id="kategori"
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach (['Berita Umum', 'Kegiatan', 'Pengumuman', 'Teknologi', 'Layanan'] as $kategori)
                            <option value="{{ $kategori }}" {{ old('kategori', $berita->kategori) == $kategori ? 'selected' : '' }}>
                                {{ $kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $berita->tanggal) }}"
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Saat Ini</label>
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="w-56 rounded-lg mb-3 shadow">
                    @else
                        <p class="text-gray-500 italic">Belum ada gambar.</p>
                    @endif

                    <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar"
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 file:mr-4 file:py-2 file:px-4
                            file:rounded-lg file:border-0 file:text-sm file:font-semibold
                            file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>

                <!-- Isi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                    <textarea name="isi" rows="8"
                        class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tulis isi berita di sini..." required>{{ old('isi', $berita->isi) }}</textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="pt-4 flex justify-between items-center">
                    <a href="{{ route('admin.berita.index') }}"
                        class="text-blue-600 hover:underline">
                        ← Kembali
                    </a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        💾 Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

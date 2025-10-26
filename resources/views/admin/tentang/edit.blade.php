<x-admin-layout>
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

        <!-- Form Edit Tentang Kami -->
        <div class="bg-white rounded-xl shadow-md p-8 border border-blue-100">
            <h3 class="text-lg font-semibold text-blue-700 mb-6 border-b pb-2">✏️ Formulir Edit Tentang Kami</h3>

            <form action="{{ route('admin.tentang.update', $tentangKami->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Profil -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Profil</label>
                    <textarea name="profil" rows="4"
                              class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Tulis profil terbaru...">{{ old('profil', $tentangKami->profil) }}</textarea>
                </div>

                <!-- Visi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Visi</label>
                    <textarea name="visi" rows="3"
                              class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Masukkan visi organisasi...">{{ old('visi', $tentangKami->visi) }}</textarea>
                </div>

                <!-- Misi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Misi</label>
                    <textarea name="misi" rows="4"
                              class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Masukkan misi organisasi...">{{ old('misi', $tentangKami->misi) }}</textarea>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar (Opsional)</label>
                    @if($tentangKami->gambar)
                        <img src="{{ asset('storage/' . $tentangKami->gambar) }}"
                             alt="Gambar" class="w-40 h-40 object-cover mb-3 rounded-lg shadow border border-blue-100">
                    @endif
                    <input type="file" name="gambar"
                           class="w-full border border-blue-200 rounded-lg px-4 py-2
                                  file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                  file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100">
                    <p class="text-sm text-gray-500 mt-1">Unggah hanya jika ingin mengganti gambar.</p>
                </div>

                <!-- Tombol Aksi -->
                <div class="pt-4 flex items-center justify-between">
                    <a href="{{ route('admin.tentang.index') }}" class="text-blue-600 hover:underline">
                        ← Kembali
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        💾 Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

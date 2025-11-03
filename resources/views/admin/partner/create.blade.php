<x-admin-layout>
    <div class="max-w-4xl mx-auto py-10 px-6 mt-40">
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

        <!-- Form Tambah Partner -->
        <div class="bg-white rounded-xl shadow-md p-8 border border-blue-100">
            <h3 class="text-lg font-semibold text-blue-700 mb-6 border-b pb-2">🤝 Formulir Tambah Partner Baru</h3>

            <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Nama Partner -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Partner</label>
                    <input type="text" name="nama" value="{{ old('nama') }}"
                           class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Masukkan nama partner..." required>
                </div>

                <!-- Logo -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Logo Partner</label>
                    <input type="file" name="logo"
                           class="w-full border border-blue-200 rounded-lg px-4 py-2
                                  file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                  file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100">
                </div>

                <!-- Link Website -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Link Website (Opsional)</label>
                    <input type="url" name="link" value="{{ old('link') }}"
                           class="w-full border border-blue-200 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="https://contoh.com">
                </div>

                <!-- Tombol Simpan -->
                <div class="pt-4 flex items-center justify-between">
                    <a href="{{ route('admin.partner.index') }}" class="text-blue-600 hover:underline">
                        ← Kembali
                    </a>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                         Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

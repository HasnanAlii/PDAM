<x-admin-layout>
    <div class="bg-white p-8 rounded-xl shadow border border-blue-100 max-w-3xl mx-auto mt-20">
        <h1 class="text-2xl font-bold text-blue-800 mb-6">Edit Tentang Kami</h1>

        <form action="{{ route('admin.tentang.update', $tentangKami->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

          

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Profil</label>
                <textarea name="profil" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('profil', $tentangKami->profil) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Visi</label>
                <textarea name="visi" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('visi', $tentangKami->visi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Misi</label>
                <textarea name="misi" rows="3"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('misi', $tentangKami->misi) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Gambar</label>
                @if($tentangKami->gambar)
                    <img src="{{ asset('storage/' . $tentangKami->gambar) }}" alt="Gambar" class="mb-2 w-32 h-32 object-cover rounded">
                @endif
                <input type="file" name="gambar"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.tentang.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">Batal</a>
                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-700 text-white hover:bg-blue-600">Perbarui</button>
            </div>
        </form>
    </div>
</x-admin-layout>

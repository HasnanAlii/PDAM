<x-admin-layout>
    <div class="bg-white p-8 rounded-xl shadow border border-blue-100 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-blue-800 mb-6">Edit Partner</h1>

        <form action="{{ route('admin.partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nama Partner</label>
                <input type="text" name="nama" value="{{ old('nama', $partner->nama) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Logo</label>
                @if($partner->logo)
                    <img src="{{ asset('storage/' . $partner->logo) }}" class="w-32 h-20 object-contain mb-2 rounded shadow">
                @endif
                <input type="file" name="logo"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Unggah hanya jika ingin mengganti logo.</p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Link Website</label>
                <input type="url" name="link" value="{{ old('link', $partner->link) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.partner.index') }}"
                   class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">Batal</a>
                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-700 text-white hover:bg-blue-600">Perbarui</button>
            </div>
        </form>
    </div>
</x-admin-layout>

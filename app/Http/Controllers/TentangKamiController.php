<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentangkami = TentangKami::first();
        return view('beranda.about', compact('tentangkami'));
    }

    public function show(TentangKami $tentangKami)
    {
        return view('tentang.show', compact('tentangkami'));
    }

    /**
     * 🔹 Daftar Tentang Kami untuk admin
     */
    public function admin()
    {
        $tentang = TentangKami::latest()->paginate(10);
        return view('admin.tentang.index', compact('tentang'));
    }

    /**
     * 🔹 Form tambah Tentang Kami (admin)
     */
    public function create()
    {
        return view('admin.tentang.create');
    }

    /**
     * 🔹 Simpan Tentang Kami baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'  => 'nullable|string|max:255',
            'profil' => 'nullable|string',
            'visi'   => 'nullable|string',
            'misi'   => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('tentang', 'public');
        }

        TentangKami::create($validated);

        return redirect()->route('admin.tentang.index')->with('success', 'Data Tentang Kami berhasil ditambahkan.');
    }

    /**
     * 🔹 Form edit Tentang Kami (admin)
     */
    public function edit(TentangKami $tentangKami)
    {
        return view('admin.tentang.edit', compact('tentangKami'));
    }

    /**
     * 🔹 Update data Tentang Kami
     */
    public function update(Request $request, TentangKami $tentangKami)
    {
        $validated = $request->validate([
            'judul'  => 'nullable|string|max:255',
            'profil' => 'nullable|string',
            'visi'   => 'nullable|string',
            'misi'   => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Ganti gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            if ($tentangKami->gambar) {
                Storage::disk('public')->delete($tentangKami->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('tentang', 'public');
        }

        $tentangKami->update($validated);

        return redirect()->route('admin.tentang.index')->with('success', 'Data Tentang Kami berhasil diperbarui.');
    }

    /**
     * 🔹 Hapus data Tentang Kami
     */
    public function destroy(TentangKami $tentangKami)
    {
        if ($tentangKami->gambar) {
            Storage::disk('public')->delete($tentangKami->gambar);
        }

        $tentangKami->delete();

        return redirect()->route('admin.tentang.index')->with('success', 'Data Tentang Kami berhasil dihapus.');
    }
}



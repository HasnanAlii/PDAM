<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * 🔹 Tampilkan daftar berita untuk publik
     */
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('berita.index', compact('beritas'));
    }
        public function showw(Berita $berita)
    {
        // Bisa juga menambahkan berita populer atau related jika mau
        return view('berita.show', compact('berita'));
    }

    /**
     * 🔹 Tampilkan daftar berita untuk admin
     */
    public function admin()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

     public function filter(Request $request)
    {
        $kategori = $request->kategori;

        if ($kategori && $kategori != '') {
            $beritas = Berita::where('kategori', $kategori)->latest()->get();
        } else {
            $beritas = Berita::latest()->get();
        }

        // Partial view hanya daftar berita
        return view('berita.partials.berita-list', compact('beritas'));
    }

    /**
     * 🔹 Form tambah berita (admin)
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * 🔹 Simpan berita baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'isi'       => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:25600',
            'penulis'   => 'nullable|string|max:255',
            'kategori'  => 'nullable|string|max:255',
            'tanggal'   => 'nullable|date',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        // Default tanggal sekarang jika kosong
        $validated['tanggal'] = $validated['tanggal'] ?? now();

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * 🔹 Detail berita untuk publik
     */
    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    /**
     * 🔹 Form edit berita (admin)
     */
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    /**
     * 🔹 Update berita
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'isi'       => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:25600',
            'penulis'   => 'nullable|string|max:255',
            'kategori'  => 'nullable|string|max:255',
            'tanggal'   => 'nullable|date',
        ]);

        // Ganti gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * 🔹 Hapus berita
     */
    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}

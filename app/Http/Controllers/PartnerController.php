<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
   
    // 🔹 Admin: daftar partner
    public function admin()
    {
        $partners = Partner::latest()->paginate(10);
        return view('admin.partner.index', compact('partners'));
    }

    // 🔹 Form tambah partner
    public function create()
    {
        return view('admin.partner.create');
    }

    // 🔹 Simpan partner baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:25600',
            'link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        }

        Partner::create($validated);

        return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    // 🔹 Form edit partner
    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }

    // 🔹 Update partner
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:25600',
            'link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($validated);

        return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil diperbarui.');
    }

    // 🔹 Hapus partner
    public function destroy(Partner $partner)
    {
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil dihapus.');
    }


    // Halaman user (beranda)
    public function tampil()
    {
        $partners = Partner::all();
        return view('beranda.partner', compact('partners'));
    }
}

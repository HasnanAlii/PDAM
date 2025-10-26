<?php

namespace App\Http\Controllers;

use App\Models\Simulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimulasiController extends Controller
{
    public function index()
    {
        $golongan = DB::table('simulasis')->pluck('golongan');
        return view('simulasi.index', compact('golongan'));
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'golongan' => 'required',
            'pemakaian_air' => 'required|integer|min:0',
        ]);

        // 🔹 Ambil data tarif & biaya admin dari database
        $tarif = DB::table('simulasis')
            ->where('golongan', $request->golongan)
            ->first();

        if (!$tarif) {
            return back()->withErrors(['golongan' => 'Golongan tidak ditemukan.']);
        }

        $pemakaian = $request->pemakaian_air;
        $biaya_admin = $tarif->biaya_admin ?? 0;

        // 🔹 Hitung pemakaian progresif
        $biaya_pemakaian = 0;

        if ($pemakaian <= 10) {
            // Semua di tarif 0-10
            $biaya_pemakaian = $pemakaian * $tarif->tarif_0_10;
        } elseif ($pemakaian <= 20) {
            // 10 pertama tarif_0_10, sisanya tarif_11_20
            $biaya_pemakaian = (10 * $tarif->tarif_0_10)
                             + (($pemakaian - 10) * $tarif->tarif_11_20);
        } else {
            // 10 pertama tarif_0_10, 10 berikutnya tarif_11_20, sisanya tarif_21
            $biaya_pemakaian = (10 * $tarif->tarif_0_10)
                             + (10 * $tarif->tarif_11_20)
                             + (($pemakaian - 20) * $tarif->tarif_21);
        }

        // 🔹 Total tagihan = biaya pemakaian + admin
        $total_tagihan = $biaya_pemakaian + $biaya_admin;

        // 🔹 Siapkan hasil untuk dikirim ke view
        $hasil = [
            'golongan' => $request->golongan,
            'pemakaian_air' => $pemakaian,
            'tarif_0_10' => $tarif->tarif_0_10,
            'tarif_11_20' => $tarif->tarif_11_20,
            'tarif_21' => $tarif->tarif_21,
            'biaya_admin' => $biaya_admin,
            'biaya_pemakaian' => $biaya_pemakaian,
            'total_tagihan' => $total_tagihan,
        ];

        $golongan = DB::table('simulasis')->pluck('golongan');

        return view('simulasi.index', compact('hasil', 'golongan'));
    }

     public function admin()
    {
        $simulasis = Simulasi::all();
        return view('admin.simulasi.index', compact('simulasis'));
    }

    public function create()
    {
        return view('admin.simulasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'golongan' => 'required|string|max:100|unique:simulasis,golongan',
            'tarif_0_10' => 'required|numeric|min:0',
            'tarif_11_20' => 'required|numeric|min:0',
            'tarif_21' => 'required|numeric|min:0',
            'biaya_admin' => 'required|numeric|min:0',
        ]);

        Simulasi::create($request->all());

        return redirect()->route('admin.simulasi.index')->with('success', 'Data simulasi berhasil ditambahkan!');
    }

    public function edit(Simulasi $simulasi)
    {
        return view('admin.simulasi.edit', compact('simulasi'));
    }

    public function update(Request $request, Simulasi $simulasi)
    {
        $request->validate([
            'golongan' => 'required|string|max:100|unique:simulasis,golongan,' . $simulasi->id,
            'tarif_0_10' => 'required|numeric|min:0',
            'tarif_11_20' => 'required|numeric|min:0',
            'tarif_21' => 'required|numeric|min:0',
            'biaya_admin' => 'required|numeric|min:0',
        ]);

        $simulasi->update($request->all());

        return redirect()->route('admin.simulasi.index')->with('success', 'Data simulasi berhasil diperbarui!');
    }

    public function destroy(Simulasi $simulasi)
    {
        $simulasi->delete();

        return redirect()->route('admin.simulasi.index')->with('success', 'Data simulasi berhasil dihapus!');
    }
}

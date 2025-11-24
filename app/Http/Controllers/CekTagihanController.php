<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CekTagihanController extends Controller
{
    // Tampilkan form cek tagihan
    public function index()
    {
        return view('cektagihan.index');
    }

    public function cek(Request $request)
{
    $request->validate([
        'nomor_pelanggan_rel' => 'required|string',
    ]);

    $nomorPelanggan = $request->nomor_pelanggan_rel;

    try {
        $response = Http::get('http://120.89.90.102:1030/api/transaksi/' . $nomorPelanggan);

        if ($response->successful()) {
            $json = $response->json();

            $filtered = collect($json['data'] ?? [])
                ->where('nomor_langganan_rel', $nomorPelanggan)
                ->values();

            $pelanggan = $filtered->first()['pelanggan'] ?? null;

            return view('cektagihan.index', [
                'data' => $filtered,
                'pelanggan' => $pelanggan,
                'nomorPelanggan' => $nomorPelanggan
            ]);
        }

        return view('cektagihan.index')->withErrors([
            'nomor_pelanggan_rel' => 'Gagal mengambil data dari server'
        ]);

    } catch (\Exception $e) {
        return view('cektagihan.index')->withErrors([
            'nomor_pelanggan_rel' => 'Terjadi kesalahan: ' . $e->getMessage()
        ]);
    }
}


}

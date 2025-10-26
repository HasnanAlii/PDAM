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

    // Proses cek tagihan dari API
    public function cek(Request $request)
    {
        $request->validate([
            'nomor_pelanggan' => 'required|string',
        ]);

        $nomorPelanggan = $request->nomor_pelanggan;

        try {
            // Contoh request API eksternal
            $response = Http::get('https://api.sistemlain.com/tagihan', [
                'nomor_pelanggan' => $nomorPelanggan,
                'api_key' => env('API_SISTEM_LAIN_KEY'),
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return view('cektagihan.index', compact('data', 'nomorPelanggan'));
            } else {
                return back()->withErrors(['nomor_pelanggan' => 'Gagal mengambil data tagihan.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['nomor_pelanggan' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}

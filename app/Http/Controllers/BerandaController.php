<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Partner;

class BerandaController extends Controller
{
public function index()
{
    $beritas = Berita::latest()->take(6)->get(); // berita lainnya
    $latestBerita = Berita::latest()->first(); // berita paling baru
    $partners = Partner::all(); // jika ingin ditampilkan juga

    return view('beranda.index', compact('beritas', 'latestBerita', 'partners'));
}

   public function admin()
    {
        // Hitung total data untuk statistik
        $totalBerita = Berita::count();
        $totalGaleri = Gallery::count();
        // Jika ada model lain, bisa ditambahkan
        // $totalSimulasi = Simulasi::count();

        return view('dashboard', compact('totalBerita', 'totalGaleri'));
    }


}

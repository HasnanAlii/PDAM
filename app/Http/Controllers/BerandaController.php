<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Simulasi;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
public function index()
{
    $beritas = Berita::latest()->take(6)->get(); 
    $latestBerita = Berita::latest()->first(); 
    $partners = Partner::all();

    return view('beranda.index', compact('beritas', 'latestBerita', 'partners'));
}

    public function admin()
    {
        $totalBerita = Berita::count();
        $totalGaleri = Gallery::count();
        $totalPartner = Partner::count();

        // Ambil 5 aktivitas terakhir (menambah data)
        $aktivitasTerakhir = collect()
            ->merge(Berita::select('judul as nama', 'created_at', DB::raw('"Berita" as jenis'))->latest()->take(5)->get())
            ->merge(Gallery::select('judul as nama', 'created_at', DB::raw('"Galeri" as jenis'))->latest()->take(5)->get())
            ->merge(Partner::select('nama as nama', 'created_at', DB::raw('"Partner" as jenis'))->latest()->take(5)->get())
            ->sortByDesc('created_at')
            ->take(5);

        return view('dashboard', compact(
            'totalBerita', 
            'totalGaleri', 
            'totalPartner', 
            'aktivitasTerakhir'
        ));
}


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;

    protected $table = 'tentang_kamis';
    protected $fillable = ['judul', 'profil', 'visi', 'misi', 'gambar'];
}

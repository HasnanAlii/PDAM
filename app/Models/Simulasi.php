<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'golongan',
        'pemakaian_air',
        'tarif_per_m3',
        'biaya_admin',
        'total_tagihan',
    ];
}

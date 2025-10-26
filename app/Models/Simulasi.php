<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulasi extends Model
{
    use HasFactory;

    protected $fillable = [
                  'golongan',
            'tarif_0_10' ,
            'tarif_11_20' ,
            'tarif_21' ,
            'biaya_admin' ,
    ];
}

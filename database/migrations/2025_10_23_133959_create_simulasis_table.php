<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('simulasis', function (Blueprint $table) {
            $table->id();
            $table->string('golongan');
            $table->integer('pemakaian_air')->nullable(); // jumlah m³ yang dipakai user
            $table->decimal('tarif_0_10', 10, 2)->default(0); // tarif 0–10 m³
            $table->decimal('tarif_11_20', 10, 2)->default(0); // tarif 11–20 m³
            $table->decimal('tarif_21', 10, 2)->default(0); // tarif >21 m³
            $table->decimal('tarif_per_m3', 10, 2)->default(0); // tarif hasil kalkulasi sesuai pemakaian
            $table->decimal('biaya_admin', 10, 2)->default(12500);
            $table->decimal('total_tagihan', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('simulasis');
    }
};

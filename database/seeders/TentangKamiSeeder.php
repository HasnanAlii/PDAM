<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKamiSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel tentang_kamis.
     */
    public function run(): void
    {
        DB::table('tentang_kamis')->insert([
            'judul' => 'Tentang Kami',
            'profil' => 'PDAM Cianjur merupakan perusahaan daerah yang bergerak di bidang penyediaan air bersih bagi masyarakat. Kami berkomitmen untuk memberikan layanan terbaik dan menjaga keberlanjutan sumber daya air untuk generasi mendatang.',
            'visi' => 'Menjadi perusahaan penyedia air bersih yang unggul, profesional, dan berorientasi pada kepuasan pelanggan.',
            'misi' => '- Memberikan pelayanan air bersih yang berkualitas dan terjangkau bagi seluruh lapisan masyarakat.
- Meningkatkan efisiensi operasional dengan teknologi modern.
- Mengelola sumber daya air secara berkelanjutan.
- Meningkatkan kesejahteraan karyawan dan kontribusi terhadap pembangunan daerah.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

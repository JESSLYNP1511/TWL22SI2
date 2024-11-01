<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;

class anggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Anggota::create([
            'name' => 'Ahmad Zaki',
            'address' => 'Jl. Merdeka No. 123, Jakarta',
            'email' => 'ahmad.zaki@example.com',
            'phone' => '081234567890',
        ]);

        Anggota::create([
            'name' => 'Budi Santoso',
            'address' => 'Jl. Diponegoro No. 45, Surabaya',
            'email' => 'budi.santoso@example.com',
            'phone' => '081298765432',
        ]);

        Anggota::create([
            'name' => 'Citra Dewi',
            'address' => 'Jl. Sudirman No. 67, Bandung',
            'email' => 'citra.dewi@example.com',
            'phone' => '081223344556',
        ]);

        Anggota::create([
            'name' => 'Dedi Pratama',
            'address' => 'Jl. Hasanuddin No. 89, Yogyakarta',
            'email' => 'dedi.pratama@example.com',
            'phone' => '081334455667',
        ]);

        Anggota::create([
            'name' => 'Eka Sari',
            'address' => 'Jl. Pahlawan No. 101, Medan',
            'email' => 'eka.sari@example.com',
            'phone' => '081345678901',
        ]);
    }
}

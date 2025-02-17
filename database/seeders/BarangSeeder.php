<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        Barang::create([
            'nama_barang' => 'Air Mineral',
            'qty' => 3,
            'kategori' => 'makanan',
            'size' => 'medium',
            'merk' => 'Le Mineral',
            'deskripsi' => 'Air minum yang ada manis manisnya kaya saya'
        ]);
    }
}

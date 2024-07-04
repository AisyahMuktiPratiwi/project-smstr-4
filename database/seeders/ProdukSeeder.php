<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            'nama' => 'Tapoki',
            'kategori' => 'Maknan Basah',
            'rasa'=>'pedas',
            'stok' => '5',
            'harga' => '12000',
            'gambar' => '1.jpeg',
        ]);
    }
}

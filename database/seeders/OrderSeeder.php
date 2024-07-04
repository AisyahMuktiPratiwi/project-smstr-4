<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'name' => 'siti',
            'email' => 'siti@gmail.com',
            'nohp' => '089767567464',
            'alamat' => 'wanaherang',
            'metodepembayaran' => 'cod',
            'kodeunik' => 'i79',
            'produk' => 'gsgxjskx',
            'totalitem' => '79',
            'totalharga' => '068679',
            'rekening' => 'jgjkgg',
            'bukti' => '1.jpg',

        ]);
    }
}

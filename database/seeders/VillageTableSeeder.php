<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_desa' => 'Desa Bojongsoang'
            ],
            [
                'nama_desa' => 'Desa Bojongsari'
            ],
            [
                'nama_desa' => 'Desa Buahbatu'
            ],
            [
                'nama_desa' => 'Desa Cipagalo'
            ],
            [
                'nama_desa' => 'Desa Lengkong'
            ],
            [
                'nama_desa' => 'Desa Tegalluar'
            ],
            [
                'nama_desa' => 'Desa Cilengkrang'
            ],
            [
                'nama_desa' => 'Desa Cipanjalu'
            ],
            [
                'nama_desa' => 'Desa Ciporeat'
            ],
            [
                'nama_desa' => 'Desa Girimekar'
            ],
            [
                'nama_desa' => 'Desa Jatiendah'
            ],
            [
                'nama_desa' => 'Desa Melatiwangi'
            ],
            [
                'nama_desa' => 'Desa Cibiru Hilir'
            ],
            [
                'nama_desa' => 'Desa Cibiru Wetan'
            ],
            [
                'nama_desa' => 'Desa Cileunyi Kulon'
            ],
            [
                'nama_desa' => 'Desa Cileunyi Wetan'
            ],
            [
                'nama_desa' => 'Desa Cimekar'
            ],
            [
                'nama_desa' => 'Desa Cinunuk'
            ],
            [
                'nama_desa' => 'Desa Ciburial'
            ],
            [
                'nama_desa' => 'Desa Cikadut'
            ],
            [
                'nama_desa' => 'Desa Cimenyan'
            ],
            [
                'nama_desa' => 'Desa Mandalamekar'
            ],
            [
                'nama_desa' => 'Desa Mekarmanik'
            ],
            [
                'nama_desa' => 'Desa Mekarsaluyu'
            ],
            [
                'nama_desa' => 'Desa Sindanglaya'
            ],
            [
                'nama_desa' => 'Desa Padasuka'
            ],
            [
                'nama_desa' => 'Desa Cibeunying'
            ],
        ];

        Village::insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Flag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no_urut' => '1',
                'nama_partai' => 'Partai Kebangkitan Bangsa (PKB)',
                'logo' => '1.png'
            ],
            [
                'no_urut' => '2',
                'nama_partai' => 'Partai Gerakan Indonesia Raya (GERINDRA)',
                'logo' => '2.png'
            ],
            [
                'no_urut' => '3',
                'nama_partai' => 'Partai Demokrasi Indonesia Perjuangan (PDI)',
                'logo' => '3.png'
            ],
            [
                'no_urut' => '4',
                'nama_partai' => 'Partai Golkar',
                'logo' => '4.jpg'
            ],
            [
                'no_urut' => '5',
                'nama_partai' => 'Partai Nasdem',
                'logo' => '5.png'
            ],
            [
                'no_urut' => '6',
                'nama_partai' => 'Partai Buruh',
                'logo' => '6.png'
            ],
            [
                'no_urut' => '7',
                'nama_partai' => 'Partai Gelombang Rakyat Indonesia',
                'logo' => '7.png'
            ],
            [
                'no_urut' => '8',
                'nama_partai' => 'Partai Keadilan Sejahtera (PKS)',
                'logo' => '8.png'
            ],
            [
                'no_urut' => '9',
                'nama_partai' => 'Partai Kebangkitan Nusantara',
                'logo' => '9.png'
            ],
            [
                'no_urut' => '10',
                'nama_partai' => 'Partai Hati Nurani Rakyat (HANURA)',
                'logo' => '10.png'
            ],
            [
                'no_urut' => '11',
                'nama_partai' => 'Partai Garda Perubahan Indonesia',
                'logo' => '11.png'
            ],
            [
                'no_urut' => '12',
                'nama_partai' => 'Partai Amanat Nasional (PAN)',
                'logo' => '12.jpeg'
            ],
            [
                'no_urut' => '13',
                'nama_partai' => 'Partai Bulan Bintang (PBB)',
                'logo' => '13.svg'
            ],
            [
                'no_urut' => '14',
                'nama_partai' => 'Partai Demokrat',
                'logo' => '14.png'
            ],
            [
                'no_urut' => '15',
                'nama_partai' => 'Partai Solidaritas Indonesia (PSI)',
                'logo' => '15.png'
            ],
            [
                'no_urut' => '16',
                'nama_partai' => 'Partai Perindo',
                'logo' => '16.png'
            ],
            [
                'no_urut' => '17',
                'nama_partai' => 'Partai Persatuan Pembangunan (PPP)',
                'logo' => '17.png'
            ],
            [
                'no_urut' => '24',
                'nama_partai' => 'Partai Ummat',
                'logo' => '24.png'
            ]
        ];
        Flag::insert($data);
    }
}

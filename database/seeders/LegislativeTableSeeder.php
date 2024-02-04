<?php

namespace Database\Seeders;

use App\Models\Legislative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LegislativeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'no_urut' => '1',
                'nama_calon' => 'Dudung Abdurohim'
            ],
            [
                'no_urut' => '2',
                'nama_calon' => 'Leni Mulyani, M.Pd'
            ],
            [
                'no_urut' => '3',
                'nama_calon' => 'Yana Cahyana'
            ],
            [
                'no_urut' => '4',
                'nama_calon' => 'Iwan Gunawan, S.Pd.I.'
            ],
            [
                'no_urut' => '5',
                'nama_calon' => 'Oman Rohman'
            ],
            [
                'no_urut' => '6',
                'nama_calon' => 'Teti Herawati'
            ],
            [
                'no_urut' => '7',
                'nama_calon' => 'Asep Nuruzzaman'
            ],
        ];
        Legislative::insert($data);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ruangan = [
            [
                'nama'      =>  '001',
                'gedung_id' =>  '1'
            ],
            [
                'nama'      =>  '002',
                'gedung_id' =>  '1'
            ],
            [
                'nama'      =>  '003',
                'gedung_id' =>  '1'
            ],
            [
                'nama'      =>  '001',
                'gedung_id' =>  '2'
            ],
            [
                'nama'      =>  '002',
                'gedung_id' =>  '2'
            ],
            [
                'nama'      =>  '003',
                'gedung_id' =>  '2'
            ],
        ];
        foreach ($ruangan as $key => $value) {
            Ruangan::create($value);
        };
    }
}

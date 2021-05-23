<?php

namespace Database\Seeders;

use App\Models\Gedung;
use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $gedung = [
            [
                'nama'  =>  'A'
            ],
            [
                'nama'  =>  'B'
            ],
        ];
        foreach ($gedung as $key => $value) {
            Gedung::create($value);
        }
    }
}

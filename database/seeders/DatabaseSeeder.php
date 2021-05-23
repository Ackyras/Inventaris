<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AkunSeeder::class);
        $this->call(GedungSeeder::class);
        $this->call(RuanganSeeder::class);
        // $this->call(BarangSeeder::class);
    }
}

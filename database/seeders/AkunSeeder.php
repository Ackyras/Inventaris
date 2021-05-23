<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name'      =>  'Ackyras',
                'username'  =>  'admin',
                'email'     =>  'admin@inventaris.co.id',
                'password'  =>  bcrypt('admin'),
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

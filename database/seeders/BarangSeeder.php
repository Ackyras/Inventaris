<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $barang = [
        //     [
        //         'nama'      =>  'Laptop geming',
        //         'kode'      =>  'LG-001',
        //         'stok'      =>  20,
        //         'merk'      =>  'alok',
        //         'ruangan_id' =>  '1',
        //         'kategori'  =>  'Elektronik'
        //     ],
        //     [
        //         'nama'      =>  'Laptop biasa',
        //         'kode'      =>  'LG-002',
        //         'stok'      =>  20,
        //         'merk'      =>  'alok',
        //         'ruangan_id' =>  '3',
        //         'kategori'  =>  'Elektronik'
        //     ],
        //     [
        //         'nama'      =>  'Laptop cacad',
        //         'kode'      =>  'LG-003',
        //         'stok'      =>  20,
        //         'merk'      =>  'alok',
        //         'ruangan_id' =>  '5',
        //         'kategori'  =>  'Elektronik'
        //     ],
        // ];
        // foreach ($barang as $key => $value) {
        //     # code...
        //     $id = Ruangan::select('id')->where('id', '=', $value->ruangan_id);
        //     Barang::create($value);
        // }
    }
}

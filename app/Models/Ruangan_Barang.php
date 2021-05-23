<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan_Barang extends Model
{
    use HasFactory;

    protected $table = 'ruangan_barangs';

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}

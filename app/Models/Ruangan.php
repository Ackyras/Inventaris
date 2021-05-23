<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangans';

    protected $fillable = [
        'nama'
    ];

    public function barang()
    {
        return $this->belongsToMany(Barang::class, 'ruangan_barangs')->withPivot('stok');
    }

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }
}

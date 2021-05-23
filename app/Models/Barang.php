<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'nama',
        'kode',
        'merk',
        'kategori',
    ];

    public function elektronik()
    {
        return $this->hasOne(Elektronik::class);
    }

    public function nonelektronik()
    {
        return $this->hasOne(NonElektronik::class);
    }

    public function ruangan()
    {
        return $this->belongsToMany(Ruangan::class, 'ruangan_barangs')->withPivot('stok');
    }

    public function peminjam()
    {
        return $this->belongsToMany(Peminjam::class, 'form_pinjams')->withPivot('jumlah', 'tgl_pinjam', 'tgl_kembali', 'tgl_kembali_fix', 'kembali');
    }
}

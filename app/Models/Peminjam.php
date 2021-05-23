<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjams';

    protected $fillable = [
        'nama',
        'no_id'
    ];

    public function barang()
    {
        return $this->belongsToMany(Barang::class, 'form_pinjams')->withPivot('jumlah', 'tgl_pinjam', 'tgl_kembali', 'tgl_kembali_fix', 'kembali');
    }
}

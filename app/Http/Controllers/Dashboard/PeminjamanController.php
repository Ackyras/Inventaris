<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Form_Pinjam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    //

    public function index()
    {
        $today = today('Asia/Jakarta')->format('d-m-Y');
        dd($today);
        $barang = Barang::paginate(15);
        return view('peminjaman.index', compact('form_pinjam'));
    }
}

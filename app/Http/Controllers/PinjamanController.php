<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Form_Pinjam;
use App\Models\Peminjam;
use App\Rules\BarangPinjaman;
use App\Rules\BarangPinjamanJumlah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamanController extends Controller
{
    //
    public function index()
    {
        $barang = Barang::all();
    }

    public function form()
    {
        $master = 'peminjaman';
        $barangs = Barang::all();
        foreach ($barangs as $items) {
            $stok = 0;
            foreach ($items->ruangan as $item) {
                $stok += $item->pivot->stok;
            }
            $items->stok = $stok;
        }
        return view('client.form', compact('barangs', 'master'));
    }

    public function store(Request $request)
    {
        $barangs = array();
        $jumlahs = array();
        $dipinjam = array();
        $jumlahDipinjam = array();
        array_push($barangs, $request->input('kode1'));
        array_push($jumlahs, $request->input('jumlah1'));

        if (!is_null($request->input('kode2')) and !is_null($request->input('jumlah2') and ($request->input('jumlah2') != 0))) {
            $request->validate(
                [
                    'kode2'                 => ['nullable', new BarangPinjaman($request->get('kode2'))],
                    'jumlah2'               => ['min:0', new BarangPinjamanJumlah($request->get('kode2')), 'numeric']
                ]
            );
            array_push($barangs, $request->input('kode2'));
            array_push($jumlahs, $request->input('jumlah2'));
        }
        if (!is_null($request->input('kode3')) and !is_null($request->input('jumlah3') and ($request->input('jumlah3') != 0))) {
            $request->validate(
                [
                    'kode3'                 => ['nullable', new BarangPinjaman($request->get('kode3'))],
                    'jumlah3'               => ['min:0', new BarangPinjamanJumlah($request->get('kode3')), 'numeric']
                ]
            );
            array_push($barangs, $request->input('kode3'));
            array_push($jumlahs, $request->input('jumlah3'));
        }
        if (!is_null($request->input('kode4')) and !is_null($request->input('jumlah4') and ($request->input('jumlah4') != 0))) {
            $request->validate(
                [
                    'kode4'                 => ['nullable', new BarangPinjaman($request->get('kode4'))],
                    'jumlah4'               => ['min:0', new BarangPinjamanJumlah($request->get('kode4')), 'numeric']
                ]
            );
            array_push($barangs, $request->input('kode4'));
            array_push($jumlahs, $request->input('jumlah4'));
        }
        if (!is_null($request->input('kode5')) and !is_null($request->input('jumlah5') and ($request->input('jumlah5') != 0))) {
            $request->validate(
                [
                    'kode5'                 => ['nullable', new BarangPinjaman($request->get('kode5'))],
                    'jumlah5'               => ['min:0', new BarangPinjamanJumlah($request->get('kode5')), 'numeric']
                ]
            );
            array_push($barangs, $request->input('kode5'));
            array_push($jumlahs, $request->input('jumlah5'));
        }

        $barangs = array_unique($barangs);
        $jumlahs = array_unique($jumlahs);

        DB::beginTransaction();
        try {
            //code...
            $peminjam = Peminjam::firstOrCreate(
                [
                    'nama'          => $request->input('nama_peminjam'),
                    'no_id'         => $request->input('no_id'),
                ]
            );

            foreach ($barangs as $key => $value) {
                $barang = Barang::where('nama', $value)->first();
                $peminjam->barang()->attach(
                    $barang->id,
                    [
                        'tgl_pinjam'        => $request->input('tanggal_peminjaman'),
                        'tgl_kembali'       => $request->input('tanggal_pengembalian'),
                        'jumlah'            => $jumlahs[$key],
                    ]
                );
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
            return back()->with('posterr', 'Gagal menambahkan data peminjaman!');
        }
        return back()->with('success', 'Data berhasil disimpan!');
    }
}

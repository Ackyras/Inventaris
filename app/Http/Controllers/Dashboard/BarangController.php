<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Ruangan;
use App\Models\Ruangan_Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kunci = null;
        $barangs = Barang::paginate(15);
        foreach ($barangs as $items) {
            $stok = 0;
            foreach ($items->ruangan as $item) {
                $stok += $item->pivot->stok;
            }
            $items->stok = $stok;
        }
        return view('barang.index', compact('barangs', 'kunci'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ruangan = Ruangan::all();
        return view('barang.create', compact('ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        Request()->validate([
            'nama'  =>  'required',
            'kode'  =>  'required',
            'merk'  =>  'required',
            'lokasi'  =>  'required_if:stok,!null',
            'stok'  =>  'nullable',
            'kategori'  =>  'required',
        ]);
        DB::beginTransaction();
        try {
            //code...
            $barang = Barang::firstOrCreate(
                [
                    'kode'      =>  $req->kode
                ],
                [
                    'nama'      =>  $req->nama,
                    'merk'      =>  $req->merk,
                    'kategori'  =>  $req->kategori,
                ]
            );
            if ($req->lokasi != null) {
                $ruangan = Ruangan::find($req->lokasi);
                $ruangan->barang()->attach(
                    $barang->id,
                    [
                        'stok'  =>  $req->stok,
                    ],
                );
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
            return back()->with('posterr', 'Gagal menambahkan data!');
        };
        return back()->with('success', 'Berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ruangan = Ruangan::all();
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ruangan_barang = Ruangan_Barang::find($id);
        DB::beginTransaction();
        try {
            //code...
            $ruangan_barang->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return back()->with('posterr', 'Gagal menghapus Item!');
        }
        return back()->with('success', 'Data barang berhasil dihapus!');
    }

    public function search()
    {
    }

    public function delete($id)
    {
        $barang = Barang::find($id);
        DB::beginTransaction();
        try {
            //code...
            $barang->delete();
            Db::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
            return back()->with('posterr', 'Gagal menghapus data barang!');
        }
        return back()->with('success', 'Data barang berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gedung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gedung = Gedung::paginate(15);
        return view('gedung.index', compact('gedung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gedung.create');
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
            'nama'  =>  'required|unique:gedungs,nama'
        ]);
        DB::beginTransaction();
        try {
            //code...
            Gedung::create([
                'nama'  =>  $req->nama,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
            return back()->with('posterr', 'Gagal menambahkan gedung');
        }
        return back()->with('success', 'Data gedung berhasil ditambahkan!');
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
        $gedung = Gedung::find($id);
        return view('gedung.edit', compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $gedung = Gedung::find($id);
        DB::beginTransaction();
        try {
            //code...
            $gedung->update([
                'nama'  =>  $req->nama,
            ]);
            $gedung->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
            return redirect()->route('gedung.index')->with('posterr', 'Gagal memperbarui data!');
        }
        return redirect()->route('gedung.index')->with('success', 'Berhasil memperbarui data!');
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
    }
}

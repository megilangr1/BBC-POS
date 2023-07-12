<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use App\Models\Satuan;
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
        $getDataBarang = Barang::with([
            'jenis',
            'satuan'
        ])->get();

        return view('backend.barang.index', [
            'dataBarang' => $getDataBarang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getJenis = Jenis::get();
        $getSatuan = Satuan::get();

        return view('backend.barang.create', [
            'daftarDataJenis' => $getJenis,
            'dataSatuan' => $getSatuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $createBarang = Barang::create([
                'id_jenis' => $request->id_jenis,
                'id_satuan' => $request->id_satuan,
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'keterangan' => $request->keterangan,
            ]);

            DB::commit();
            return redirect()->route('barang.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        dd($request->all());
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
        try {
            $getDataBarang = Barang::where('id', '=', $id)->firstOrFail();

            $getJenis = Jenis::get();
            $getSatuan = Satuan::get();

            return view('backend.barang.edit', [
                'barang' => $getDataBarang,
                'daftarDataJenis' => $getJenis,
                'dataSatuan' => $getSatuan
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
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
        DB::beginTransaction();
        try {
            $getBarang = Barang::where('id', '=', $id)->firstOrFail();
            $updateBarang = $getBarang->update([
                'id_jenis' => $request->id_jenis,
                'id_satuan' => $request->id_satuan,
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'keterangan' => $request->keterangan,
            ]);

            DB::commit();
            return redirect()->route('barang.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
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

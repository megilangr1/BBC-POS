<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = Satuan::get();
        return view('backend.satuan.index', [
            'dataSatuan' => $getData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_satuan' => 'required|string|max:5|unique:satuans,kode_satuan',
            'nama_satuan' => 'required|string',
            'keterangan' => 'nullable|string', 
        ], [
            'required' => 'Input Tidak Boleh Kosong !'
        ]);

        DB::beginTransaction();
        try {
            $createData = Satuan::create([
                'kode_satuan' => $request->kode_satuan,
                'nama_satuan' => $request->nama_satuan,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();
            return redirect()->route('satuan.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
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
            $getData = Satuan::where('id', '=', $id)->firstOrFail();

            return view('backend.satuan.edit', [
                'satuan' => $getData
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
        $this->validate($request, [
            'kode_satuan' => 'required|string|max:5|unique:satuans,kode_satuan,' . $id,
            'nama_satuan' => 'required|string',
            'keterangan' => 'nullable|string', 
        ], [
            'required' => 'Input Tidak Boleh Kosong !'
        ]);

        DB::beginTransaction();
        try {
            $getData = Satuan::where('id', '=', $id)->firstOrFail();

            $updateData = $getData->update([
                'kode_satuan' => $request->kode_satuan,
                'nama_satuan' => $request->nama_satuan,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();
            return redirect()->route('satuan.index');
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
        DB::beginTransaction();

        try {
            $getData = Satuan::where('id', '=', $id)->firstOrFail();
            $deleteData = $getData->delete();
            
            DB::commit();
            return redirect()->route('satuan.index');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}

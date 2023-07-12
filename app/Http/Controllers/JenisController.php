<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = Jenis::get();

        return view('backend.jenis.index', [
            'dataJenis' => $getData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.jenis.create');
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
            'kode_jenis' => 'required|string|max:5|unique:jenis,kode_jenis',
            'nama_jenis' => 'required|string',
            'keterangan' => 'nullable|string'
        ], [
            'required' => 'Input Tidak Boleh Kosong !',
            'string' => 'Input Harus Berupa Alphanumerik !',
            'max' => 'Maksimum Karakter Yang di-Input Tidak Boleh Lebih Dari :max Karakter',
            'unique' => 'Data Dengan Input Tersebut Sudah Ada !'
        ]);

        DB::beginTransaction();

        try {
            $createData = Jenis::create([
                'kode_jenis' => $request->kode_jenis,
                'nama_jenis' => $request->nama_jenis,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();
            return redirect()->route('jenis.index');
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
            $getData = Jenis::where('id', '=', $id)->firstOrFail();

            return view('backend.jenis.edit', [
                'jenis' => $getData
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
            'kode_jenis' => 'required|string|max:5|unique:jenis,kode_jenis,' . $id,
            'nama_jenis' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);

        DB::beginTransaction();
        try {
            $getData = Jenis::where('id', '=', $id)->firstOrFail();
            $updateData = $getData->update([
                'kode_jenis' => $request->kode_jenis,
                'nama_jenis' => $request->nama_jenis,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();
            return redirect()->route('jenis.index');
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
            $getData = Jenis::where('id', '=', $id)->firstOrFail();
            $deleteData = $getData->delete();

            DB::commit();
            return redirect()->route('jenis.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}

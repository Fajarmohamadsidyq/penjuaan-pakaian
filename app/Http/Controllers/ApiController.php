<?php

namespace App\Http\Controllers;

use App\Models\merk;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $merk = merk::all();
        // return view('merk.index' , compact('merk'));

        //ubah ke json
        return response()->json([
        'succes' => true,
        'message' => 'List Data Merk',
        'data' => $merk
    ], 200);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // validasi data
        $validate = $request->validate([
            'nama_merk' => 'required',
        ]);

        $merk = new merk;
        $merk->nama_merk = $request->nama_merk;
        $merk->save();

        //ubah ke json
        return response()->json([
        'succes' => true,
        'message' => 'List Tambah Merk',
        'data' => $merk
    ], 200);
    }

    public function show($id)
    {
         $merk = merk::find($id);
        // return view('merk.index' , compact('merk'));

        //ubah ke json
        return response()->json([
        'succes' => true,
        'message' => 'Show Data Merk',
        'data' => $merk
    ], 200);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

        $merk = merk::findOrFail($id);
        $merk->nama_merk = $request->nama_merk;
        $merk->save();

        //ubah ke json
        return response()->json([
        'succes' => true,
        'message' => 'Data Merk Berhasil Di Edit',
        'data' => $merk
    ], 200);
    }


    public function destroy($id)
    {

    }
}

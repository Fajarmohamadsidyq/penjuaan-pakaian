<?php

namespace App\Http\Controllers;

use App\Models\merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = merk::all();
        return view('merk.index' , compact('merk'));
        //ubah ke json
        //return response()->json([
        //'succes' => true,
        //'message' => 'List Data Merk',
        //'data' => $merk
    //], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $validate = $request->validate([
            'nama_merk' => 'required',
        ]);

        $merk = new merk;
        $merk->nama_merk = $request->nama_merk;
        $merk->save();
        return redirect()->route('merk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merk = merk::findOrFail($id);
        return view('merk.show', compact('merk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merk = merk::findOrFail($id);
        return view('merk.edit', compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validasi data
        $validate = $request->validate([
            'nama_merk' => 'required',
        ]);

        $merk = merk::findOrFail($id);
        $merk->nama_merk = $request->nama_merk;
        $merk->save();
        return redirect()->route('merk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merk = merk::findOrFail($id);
        $merk->delete();
        return redirect()->route('merk.index');
    }


    public function data()
    {
        $merk = merk::all();
        // ubah ke json
        return response()->json([
        'succes' => true,
        'message' => 'List Data Merk',
        'data' => $merk
    ], 200);
    }
}

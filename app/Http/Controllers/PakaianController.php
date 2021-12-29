<?php

namespace App\Http\Controllers;

use App\Models\pakaian;
use Illuminate\Http\Request;

class PakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakaian = pakaian::all();
        return view('pakaian.index' , compact('pakaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pakaian = pakaian::all();
        return view('pakaian.create', compact('pakaian'));
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
            'nama' => 'required',
            'id_merk' => 'required',
            'id_jenis' => 'required',
            'harga' => 'required',
            'id_supplier' => 'required',
        ]);

        $pakaian = new pakaian;
        $pakaian->nama = $request->nama;
        $pakaian->id_merk = $request->id_merk;
        $pakaian->id_jenis = $request->id_jenis;
        $pakaian->harga = $request->harga;
        $pakaian->id_supplier = $request->id_supplier;
        $pakaian->save();
        return redirect()->route('pakaian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function show(pakaian $pakaian)
    {
        $pakaian = pakaian::all();
        return view('pakaian.show', compact('pakaian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function edit(pakaian $pakaian)
    {
        $pakaian = pakaian::all();
        return view('pakaian.edit', compact('pakaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pakaian $pakaian)
    {
        // validasi data
        $validate = $request->validate([
            'nama' => 'required',
            'id_merk' => 'required',
            'id_jenis' => 'required',
            'harga' => 'required',
            'id_supplier' => 'required',
        ]);

        $pakaian = new pakaian;
        $pakaian->nama = $request->nama;
        $pakaian->id_merk = $request->id_merk;
        $pakaian->id_jenis = $request->id_jenis;
        $pakaian->harga = $request->harga;
        $pakaian->id_supplier = $request->id_supplier;
        $pakaian->save();
        return redirect()->route('pakaian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pakaian  $pakaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pakaian $pakaian)
    {
        $pakaian = pakaian::findOrFail($pakaian);
        $pakaian->delete();
        return redirect()->route('pakaians.index');
    }
}

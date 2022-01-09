<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Models\pakaian;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok = stok::all();
        return view('stok.index' , compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pakaian = pakaian::all();
        $stok = stok::all();
        return view('stok.create', compact('pakaian', 'stok'));
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
            'id_pakaian' => 'required',
            'tgl_stok' => 'required',
            'qty_stok' => 'required',
        ]);

        $stok = new stok;
        $stok->id_pakaian = $request->id_pakaian;
        $stok->tgl_stok = $request->tgl_stok;
        $stok->qty_stok = $request->qty_stok;
        $stok->save();
        return redirect()->route('stok.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stok $stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy(stok $stok)
    {
        //
    }
}

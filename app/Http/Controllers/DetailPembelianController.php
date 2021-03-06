<?php

namespace App\Http\Controllers;

use App\Models\detailPembelian;
use App\Models\penjualan;
use App\Models\pakaian;
use Illuminate\Http\Request;

class DetailPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailPembelian = detailPembelian::all();
        return view('detailPembelian.index' , compact('detailPembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pakaian = pakaian::all();
        $penjualan = penjualan::all();
        $detailPembelian = detailPembelian::all();
        return view('detailPembelian.create', compact('pakaian', 'penjualan', 'detailPembelian'));
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
            'id_penjualan' => 'required',
            'id_pakaian' => 'required',
            'qty' => 'required',
            'total_harga' => 'required',
        ]);

        $detailPembelian = new detailPembelian;
        $detailPembelian->id_penjualan = $request->id_penjualan;
        $detailPembelian->id_pakaian = $request->id_pakaian;
        $detailPembelian->qty = $request->qty;
        $detailPembelian->total_harga = $request->total_harga;
        $detailPembelian->save();
        return redirect()->route('detailPembelian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailPembelian = detailPembelian::findOrFail($id);
        $penjualan = penjualan::all();
        $pakaian = pakaian::all();
        return view('detailPembelian.show', compact('detailPembelian', 'penjualan', 'pakaian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $detailPembelian = detailPembelian::findOrFail($id);
        $penjualan = penjualan::all();
        $pakaian = pakaian::all();
        return view('detailPembelian.edit', compact('detailPembelian', 'penjualan', 'pakaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data
        $validate = $request->validate([
            'id_penjualan' => 'required',
            'id_pakaian' => 'required',
            'qty' => 'required',
            'total_harga' => 'required',
        ]);

        $detailPembelian = detailPembelian::findOrFail($id);
        $detailPembelian->id_penjualan = $request->id_penjualan;
        $detailPembelian->id_pakaian = $request->id_pakaian;
        $detailPembelian->qty = $request->qty;
        $detailPembelian->total_harga = $request->total_harga;
        $detailPembelian->save();
        return redirect()->route('detailPembelian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailPembelian = detailPembelian::findOrFail($id);
        $detailPembelian->delete();
        return redirect()->route('detailPembelian.index');
    }
}

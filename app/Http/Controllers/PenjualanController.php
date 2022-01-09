<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use App\Models\pelanggan;
use App\Models\chart;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = penjualan::all();
        return view('penjualan.index' , compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chart = chart::all();
        $pelanggan = pelanggan::all();
        $penjualan = penjualan::all();
        return view('penjualan.create', compact('pelanggan', 'penjualan', 'chart'));
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
            'id_pelanggan' => 'required',
            'id_chart' => 'required',
            'tgl_pembelian' => 'required',
            'total_pembelian' => 'required',
        ]);

        $penjualan = new penjualan;
        $penjualan->id_pelanggan = $request->id_pelanggan;
        $penjualan->id_chart = $request->id_chart;
        $penjualan->tgl_pembelian = $request->tgl_pembelian;
        $penjualan->total_pembelian = $request->total_pembelian;
        $penjualan->save();
        return redirect()->route('penjualan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjualan $penjualan)
    {
        //
    }
}

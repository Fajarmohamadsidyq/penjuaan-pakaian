<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;
use App\Models\penjualan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pembayaran = pembayaran::all();
        return view('pembayaran.index' , compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayaran = pembayaran::all();
        $penjualan = penjualan::all();
        return view('pembayaran.create', compact('pembayaran', 'penjualan'));
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
            'tgl_bayar' => 'required',
            'total' => 'required',
            'metode' => 'required',
            'id_penjualan' => 'required',
        ]);

        $pembayaran = new pembayaran;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->total = $request->total;
        $pembayaran->metode = $request->metode;
        $pembayaran->id_penjualan = $request->id_penjualan;
        $pembayaran->save();
        return redirect()->route('pembayaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = pembayaran::findOrFail($id);
        $penjualan = penjualan::all();
        return view('pembayaran.show', compact('pembayaran', 'penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = pembayaran::findOrFail($id);
        $penjualan = penjualan::all();
        return view('pembayaran.edit', compact('pembayaran', 'penjualan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data
        $validate = $request->validate([
            'tgl_bayar' => 'required',
            'total' => 'required',
            'metode' => 'required',
            'id_penjualan' => 'required',
        ]);

        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->total = $request->total;
        $pembayaran->metode = $request->metode;
        $pembayaran->id_penjualan = $request->id_penjualan;
        $pembayaran->save();
        return redirect()->route('pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index');
    }
}

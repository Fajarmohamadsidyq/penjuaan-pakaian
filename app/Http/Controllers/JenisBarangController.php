<?php

namespace App\Http\Controllers;

use App\Models\jenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisBarang = jenisBarang::all();
        return view('jenisBarang.index' , compact('jenisBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenisBarang.create');
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
            'jenis_barang' => 'required',
            'harga' => 'required',
        ]);

        $jenisBarang = new jenisBarang;
        $jenisBarang->jenis_barang = $request->jenis_barang;
        $jenisBarang->harga = $request->harga;
        $jenisBarang->save();
        return redirect()->route('jenisBarang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenisBarang = jenisBarang::findOrFail($id);
        return view('jenisBarang.show', compact('jenisBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisBarang = jenisBarang::findOrFail($id);
        return view('jenisBarang.edit', compact('jenisBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validasi data
        $validate = $request->validate([
            'jenis_barang' => 'required',
            'harga' => 'required',
        ]);

        $jenisBarang = jenisBarang::findOrFail($id);
        $jenisBarang->jenis_barang = $request->jenis_barang;
        $jenisBarang->harga = $request->harga;
        $jenisBarang->save();
        return redirect()->route('jenisBarang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisBarang = jenisBarang::findOrFail($id);
        $jenisBarang->delete();
        return redirect()->route('jenisBarang.index');
    }
}

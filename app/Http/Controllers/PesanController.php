<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use App\Models\pakaian;
use App\Models\detailPembelian;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $pakaian = pakaian::where('id', $id)->first();

        return view('pesan.index', compact('pakaian'));
    }

    public function pesan(Request $request, $id)
    {
        $pakaian = pakaian::where('id', $id)->first();
        $tanggal = Carbon::now();
        return view('pesan.co',compact('pakaian'));

         //cek validasi
        $cek_pesanan = pesan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        //simpan ke database pesanan
        if (empty($cek_pesanan)) {
            $pesanan = new pesan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }

        //simpan ke database pesanan detail
        $pesanan_baru = pesan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek pesanan detail
        $cek_pesanan_detail = detailPembelian::where('$id_pakaian', $pakaian->id)->where('id_penjualan', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new detailPembelian;
            $pesanan_detail->id_pakaian = $pakaian->id;
            $pesanan_detail->id_penjualan = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pakaian->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = detailPembelian::where('$id_pakaian', $pakaian->id)->where('id_penjualan', $pesanan_baru->id)->first();

            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            //harga sekarang
            $harga_pesanan_detail_baru = $pakaian->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total
        $pesanan = pesan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $pakaian->harga * $request->jumlah_pesan;
        $pesanan->update();

        Alert::success('Pesanan masuk keranjang', 'Success');
        return redirect('check-out');
    }

    // public function checkout($id){

    //     return view('pesan.co');
    // }


}

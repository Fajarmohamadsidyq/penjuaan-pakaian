<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;

    protected $visible = ['id_pelanggan', 'id_chart', 'tgl_pembelian', 'total_pembelian'];
    protected $fillable = ['id_pelanggan', 'id_chart', 'tgl_pembelian', 'total_pembelian'];
    public $timestamps = true;

    public function pelanggan()
    {
        return $this->belongsTo('App\Models\pelanggan', 'id_pelanggan');
    }
    public function chart()
    {
        return $this->belongsTo('App\Models\chart', 'id_chart');
    }
}

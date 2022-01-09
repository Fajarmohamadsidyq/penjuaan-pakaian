<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chart extends Model
{
    use HasFactory;

    protected $visible = ['id_pelanggan', 'id_pakaian', 'qty', 'total_harga'];
    protected $fillable = ['id_pelanggan', 'id_pakaian', 'qty', 'total_harga'];
    public $timestamps = true;

    public function pakaian()
    {
        return $this->belongsTo('App\Models\pakaian', 'id_pakaian');
    }
    public function pelanggan()
    {
        return $this->belongsTo('App\Models\pelanggan', 'id_pelanggan');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    use HasFactory;

    protected $visible = ['id_pakaian', 'tgl_stok', 'qty_stok'];
    protected $fillable = ['id_pakaian', 'tgl_stok', 'qty_stok'];
    public $timestamps = true;

    public function pakaian()
    {
        return $this->belongsTo('App\Models\pakaian', 'id_pakaian');
    }
}

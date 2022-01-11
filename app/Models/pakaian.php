<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pakaian extends Model
{
    use HasFactory;

    protected $visible = ['nama', 'id_merk', 'id_jenis', 'harga', 'id_supplier', 'foto'];
    protected $fillable = ['nama', 'id_merk', 'id_jenis', 'harga', 'id_supplier', 'foto'];
    public $timestamps = true;

    public function merk()
    {
        return $this->belongsTo('App\Models\merk', 'id_merk');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\supplier', 'id_supplier');
    }

    public function jenisBarang()
    {
        return $this->belongsTo('App\Models\jenisBarang', 'id_jenis');
    }
    public function image()
    {
        if ($this->cover && file_exists(public_path('image/pakaian/' . $this->cover))) {
            return asset('image/pakaian/' . $this->cover);
        } else {
            return asset('image/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('image/pakaian/' . $this->cover))) {
            return unlink(public_path('image/pakaian/' . $this->cover));
        }
    }
}

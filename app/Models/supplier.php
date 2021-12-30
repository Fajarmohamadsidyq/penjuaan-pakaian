<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;

    protected $visible = ['nama', 'alamat', 'no_tlpn'];
    protected $fillable = ['nama', 'alamat', 'no_tlpn'];
    public $timestamps = true;

    public function pakaian()
    {
        return $this->hasMany('App\Models\pakaian', 'id_supplier');
    }
}

<?php

namespace App\Models;
use Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Merk extends Model
{
    use HasFactory;

    protected $visible = ['nama_merk'];
    protected $fillable = ['nama_merk'];
    public $timestamps = true;

    public function pakaian()
    {
        return $this->hasMany('App\Models\pakaian', 'id_merk');
    }
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($parent) {
            if ($parent->pakaian->count() > 0) {
                Alert::error('Failed', 'Data not deleted');
                return false;
            }
        });
    }
}

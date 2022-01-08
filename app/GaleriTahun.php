<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaleriTahun extends Model
{
    //
    protected $fillable = ['folder'];

    public function fotos()
    {
        return $this->hasMany('App\Foto', 'galeri_tahuns_id');
    }
}

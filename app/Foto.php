<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    //
    protected $fillable = [
        'galeri_tahuns_id',
        'foto'
    ];
    public function folder()
    {
        return $this->belongsTo('App\GaleriTahun');
    }
}

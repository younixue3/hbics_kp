<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KaryaFoto extends Model
{
    //
    protected $fillable = ['karya_id', 'foto'];

    public function karya()
    {
        return $this->belongsTo('App\Karya');
    }
}

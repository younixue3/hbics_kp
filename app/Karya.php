<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karyas';
    protected $guarded = [];

    public function foto()
    {
        return $this->hasMany(KaryaFoto::class);
    }

    public function likes()
    {
        return $this->hasMany('App\Komentar')->where('liked', 1);
    }

    public function komentars()
    {
        return $this->hasMany('App\Komentar')->where('komentar', '!=', '');
    }
}

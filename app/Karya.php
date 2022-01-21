<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karyas';
    protected $guarded = [];

    public function foto()
    {
        return $this->hasMany('App\KaryaFoto', 'karya_id', 'id');
    }

    public function event()
    {
        return $this->hasOne('App\Event', 'id', 'event_id');
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

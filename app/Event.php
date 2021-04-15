<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'tagline',
        'logo',
        'deskripsi',
        'status'
    ];
    public function juris()
    {
        return $this->hasMany('App\Juri');
    }
    public function timelines()
    {
        return $this->hasMany('App\Timeline');
    }
    public function karyas()
    {
        return $this->hasMany('App\Karya');
    }
    public function expo()
    {
        return $this->hasMany('App\Timeline')->where('kode', '#06');
    }
}

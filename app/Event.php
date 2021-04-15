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
}

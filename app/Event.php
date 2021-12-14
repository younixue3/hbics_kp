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
        return $this->hasMany('App\Juri', 'event_id', 'id');
    }
    public function timelines()
    {
        return $this->hasMany('App\Timeline');
    }
    public function karyas()
    {
        return $this->hasOne('App\Karya', 'event_id', 'id');
    }
    public function sponsors()
    {
        return $this->hasMany('App\Sponsor')->orderBy('created_at', 'desc');
    }
//    public function pendaftaran()
//    {
//        return $this->hasOne('App\Timeline')->where('kode', '#01');
//    }
//    public function pengisian()
//    {
//        return $this->hasOne('App\Timeline')->where('kode', '#03');
//    }
//    public function expo()
//    {
//        return $this->hasOne('App\Timeline')->where('kode', '#06');
//    }
}

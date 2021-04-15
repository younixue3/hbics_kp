<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    //
    protected $fillable = [
        'user_id',
        'event_id',
        'jenjang',
        'kategori',
        'foto_tim',
        'foto_poster',
        'tentang_tim',
        'nama',
        'deskripsi',
        'link_profil',
        'link_presentation',
        'link_mockup',
        'proposal'
    ];
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function komentars()
    {
        return $this->hasMany('App\Komentar');
    }
    public function likers()
    {
        return $this->hasMany('App\Komentar')->where('liked', 'true');
    }
}

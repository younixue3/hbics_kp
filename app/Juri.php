<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juri extends Model
{
    //
    protected $fillable = [
        'event_id',
        'user_id',
        'foto',
        'nama',
        'url_profil',
        'quote'
    ];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    //
    protected $fillable = ['logo', 'keterangan', 'event_id'];

    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}

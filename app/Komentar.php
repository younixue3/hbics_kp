<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    //
    protected $fillable = [
        'user_id',
        'karya_id',
        'komentar',
        'liked',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function karya()
    {
        return $this->belongsTo('App\Karya');
    }
}

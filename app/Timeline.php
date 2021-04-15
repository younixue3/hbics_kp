<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    //
    protected $fillable = [
        'event_id',
        'nama',
        'kode',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan'
    ];
    protected $dates = ['tanggal_mulai', 'tanggal_selesai'];
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}

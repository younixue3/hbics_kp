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
    // public function karyaFiltered($jenjang, $kategori)
    // {
    //     switch ($jenjang) {
    //         case 'smp':
    //             $jenjang = 'SMP/MTS';
    //             break;
    //         case 'sma':
    //             $jenjang = 'SMA/SMK/MAN';
    //             break;
    //     }
    //     switch ($kategori) {
    //         case 'kriya':
    //             $kategori = 'Kriya';
    //             break;
    //         case 'fashion':
    //             $kategori = 'Fashion';
    //             break;
    //         case 'food-and-baverage':
    //             $kategori = 'Food and Baverage';
    //             break;
    //         case 'aplikasi-dan-game':
    //             $kategori = 'Aplikasi dan Game';
    //             break;
    //         case 'desain-grafis':
    //             $kategori = 'Desain Grafis';
    //             break;
    //     }
    //     return $this->hasMany('App\Karya')->where('jenjang', $jenjang)->where('kategori', $kategori);
    // }
    public function pendaftaran()
    {
        return $this->hasOne('App\Timeline')->where('kode', '#01');
    }
    public function pengisian()
    {
        return $this->hasOne('App\Timeline')->where('kode', '#03');
    }
    public function expo()
    {
        return $this->hasOne('App\Timeline')->where('kode', '#06');
    }
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\AnggotaKelompok as AnggotaKelompok;
use Illuminate\Database\Eloquent\Model;
use App\Karya;

class   User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'desc', 'role', 'provinsi_id', 'kota_kab_id', 'event_id', 'kategori_peserta', 'pembayaran', 'foto_profile', 'jenjang', 'kategori_lp', 'no_hp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function karya()
    {
        return $this->hasOne('App\Karya', 'user_id', 'id');
    }
//    public function komentar()
//    {
//        return $this->hasOne('App\Komentar');
//    }
    public function anggota()
    {
        return $this->hasMany('App\AnggotaKelompok', 'kelompok_id', 'id');
    }

    public function kategori_lp()
    {
        return $this->hasOne('App\AnggotaKelompok', 'kategori_lp', 'id');
    }
}

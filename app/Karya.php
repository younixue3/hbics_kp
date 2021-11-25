<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karyas';
    protected $guarded = [];

    public function foto()
    {
        return $this->hasMany(KaryaFoto::class);
    }
}

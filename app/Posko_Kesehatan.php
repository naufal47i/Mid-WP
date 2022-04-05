<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posko_Kesehatan extends Model
{
    protected $table = 'posko__kesehatans';
    public $primaryKey = 'id_posko';

    public function ambulan(){
        return $this->hasMany('App\Ambulan');
    }

    public function relawan()
    {
        return $this->hasMany('App\Relawan');
    }
}

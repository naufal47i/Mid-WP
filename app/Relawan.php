<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    protected $table = 'relawans';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function posko()
    {
        return $this->belongsTo('App\Posko_Kesehatan');
    }
}

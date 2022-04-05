<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulan extends Model
{
    protected $table = 'ambulans';
    public $primaryKey = 'id_ambulan';
    public $timestamps = false;

    public function PoskoKesehatan(){
        return $this->belongsTo('App\Posko_Kesehatan');
    }
}

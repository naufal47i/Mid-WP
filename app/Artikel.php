<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';
    public $primaryKey = 'id_artikel';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

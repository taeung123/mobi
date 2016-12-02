<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class goicuoc extends Model
{
    protected $table = "goicuoc";
    public function goidichvu(){
    	return $this->belongsTo('App\goidichvu','idGoiDichVu','id');
    }
}

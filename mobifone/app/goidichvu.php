<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class goidichvu extends Model
{
    protected $table = "goidichvu";
    public function loaikh(){
    	return $this->belongsTo('App\loaikh','LoaiUser','id');
    }
    public function goicuoc(){
    	return $this->hasMany('App\goicuoc','idGoiDichVu','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaikh extends Model
{
    protected $table = "loaiuser";
    public function goidichvu(){
          return $this->hasMany('App\goidichvu','LoaiUser','id');
    }
    public function goicuoc(){
    	return $this->hasManyThrough('App\goicuoc','App\goidichvu','LoaiUser','idGoiDichVu','id');
    }
}

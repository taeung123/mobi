<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faq-detail extends Model
{
    protected $table ="chitietfaq";
    public function faq(){
    	return $this->belongsTo('App\faq','idFAQ','id');
    }
}

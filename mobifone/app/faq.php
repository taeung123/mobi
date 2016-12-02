<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    protected $table = "faq";
    public function faqdetail(){
    	return $this->hasMany('App\faq-detail','idFAQ','id');
    }
}

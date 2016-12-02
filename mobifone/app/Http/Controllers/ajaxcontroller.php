<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\goidichvu;
class ajaxcontroller extends Controller
{
    //
    public function getdichvu($id){
         $dichvu = goidichvu::where('LoaiUser',$id)->get();
          foreach ($dichvu as $dv) {
           echo" <option value='".$dv->id."'>".$dv->Ten."</option>";
       }
    }
}
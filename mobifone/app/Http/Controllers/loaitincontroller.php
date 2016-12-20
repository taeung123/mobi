<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;

class loaitincontroller extends Controller
{
     public function getdanhsach(){
       $loaitin = loaitin::all();
       return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    } 
    function getthem(){
    	return view('admin.loaitin.them');
    }
    function postthem(Request $re){
    	$this->validate($re,['ten'=>'required|unique:loaitin,Ten'],['ten.required'=>'Loại tin không được bỏ trống','ten.unique'=>'Loại tin đã tồn tại']);
    	$lt = new loaitin;
    	$lt->Ten = $re->ten;
    	$lt->save();
    	return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công');
    }
    function getsua($id){
    	$loaitin = loaitin::find($id);
    	return view('admin.loaitin.sua',['loaitin'=>$loaitin]);
    }
    function postsua(Request $re,$id){
    	$this->validate($re,['ten'=>'required|unique:loaitin,Ten'],['ten.required'=>'Loại tin không được bỏ trống','ten.unique'=>'Loại tin đã tồn tại']);
    	$loaitin =  loaitin::find($id);
    	$loaitin->Ten = $re->ten;
    	$loaitin->save();
    	return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    function getxoa($id){
    	$loaitin = loaitin::find($id);
    	$loaitin->delete();
    	return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công');
    }
}

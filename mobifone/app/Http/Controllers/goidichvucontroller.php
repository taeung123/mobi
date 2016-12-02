<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\goidichvu;
use App\loaikh;
class goidichvucontroller extends Controller
{
    public function getdanhsach(){
    	$dichvu = goidichvu::all();
    	return view('admin.goidichvu.danhsach',['dichvu'=>$dichvu]);
    }
    function getthem(){

    	$khachhang = loaikh::all(); 
    	return view('admin.goidichvu.them',['khachhang'=>$khachhang]);
    }
    function postthem(Request $re){
    	$this->validate($re,['ten'=>'required|unique:goidichvu,Ten'],['ten.required'=>'Gói dịch vụ không được bỏ trống','ten.unique'=>'gói dịch vụ đã tồn tại']);
    	$dichvu = new goidichvu;
    	$dichvu->Ten = $re->ten;
    	$dichvu->MoTa = $re->mota;
    	$dichvu->LoaiUser = $re->khachhang;
    	$dichvu->save();
    	return redirect('admin/goidichvu/them')->with('thongbao','Thêm thành công');
    }
    function getsua($id){
    	$khachhang = loaikh::all();
    	$dichvu = goidichvu::find($id);
    	return view('admin.goidichvu.sua',['dichvu'=>$dichvu,'khachhang'=>$khachhang]);
    }
    function postsua(Request $re,$id){
    	$this->validate($re,['ten'=>'required|unique:goidichvu,Ten'],['ten.required'=>'Gói dịch vụ không được bỏ trống','ten.unique'=>'gói dịch vụ đã tồn tại']);
    	$dichvu =goidichvu::find($id);
    	$dichvu->Ten = $re->ten;
    	$dichvu->MoTa = $re->mota;
    	$dichvu->LoaiUser = $re->khachhang;
    	$dichvu->save();
    	return redirect('admin/goidichvu/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    function getxoa($id){
    	$dichvu = goidichvu::find($id);
    	$dichvu->delete();
    	return redirect('admin/goidichvu/danhsach')->with('thongbao','Xóa thành công');
    }
}

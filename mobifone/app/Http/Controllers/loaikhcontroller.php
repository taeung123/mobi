<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaikh;
class loaikhcontroller extends Controller
{
    public function getdanhsach(){
        $loaikh = loaikh::all();
    	return view('admin.loai-KH.danhsach',['loaikh'=>$loaikh]);
    } 
    function getthem(){
    	return view('admin.loai-KH.them');
    }
    function postthem(Request $re){
    	$this->validate($re,['ten'=>'required|unique:loaiuser,Ten'],['ten.required'=>'Loại khách hàng không được bỏ trống','ten.unique'=>'Loại khách hàng đã tồn tại']);
    	$kh = new loaikh;
    	$kh->Ten = $re->ten;
    	$kh->save();
    	return redirect('admin/loaikh/them')->with('thongbao','Thêm thành công');
    }
    function getsua($id){
    	$kh = loaikh::find($id);
    	return view('admin.loai-KH.sua',['kh'=>$kh]);
    }
    function postsua(Request $re,$id){
    	$this->validate($re,['ten'=>'required|unique:loaiuser,Ten'],['ten.required'=>'Loại khách hàng không được bỏ trống','ten.unique'=>'Loại khách hàng đã tồn tại']);
    	$kh =  loaikh::find($id);
    	$kh->Ten = $re->ten;
    	$kh->save();
    	return redirect('admin/loaikh/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    function getxoa($id){
    	$kh = loaikh::find($id);
    	$kh->delete();
    	return redirect('admin/loaikh/danhsach')->with('thongbao','Xóa thành công');
    }
}

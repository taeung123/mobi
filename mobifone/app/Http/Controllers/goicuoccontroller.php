<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\goicuoc;
use App\loaikh;
use App\goidichvu;
class goicuoccontroller extends Controller
{
     public function getdanhsach(){
    	$cuoc = goicuoc::all();
    	return view('admin.goicuoc.danhsach',['cuoc'=>$cuoc]);
    }
    function getthem(){
        $dichvu = goidichvu::all();
    	$khachhang = loaikh::all(); 
    	return view('admin.goicuoc.them',['khachhang'=>$khachhang,'dichvu'=>$dichvu]);
    }
    function postthem(Request $re){
    	$this->validate($re,['ten'=>'required|unique:goicuoc,Ten','tomtat'=>'required','dichvu'=>'required','noidung'=>'required'],
    		['ten.required'=>'Gói cước không được bỏ trống','ten.unique'=>'gói dịch vụ đã tồn tại','tomtat.required'=>'Giới thiệu không được bỏ trống','dichvu.required'=>'Bạn chưa chọn gói dịch vụ','noidung.required'=>'Nội dung không được bỏ trống']);
    	$goicuoc = new goicuoc;
    	$goicuoc->Ten = $re->ten;
    	$goicuoc->TomTat = $re->tomtat;
    	$goicuoc->idGoiDichVu = $re->dichvu;
    	 if($re->hasFile('hinh')){
         	    $file = $re->file('hinh');
                $name = $file->getClientOriginalName();              
                $hinh = str_random(4).'_'.$name;
               //echo $hinh;
                $file->move("upload/goicuoc",$hinh);
                $goicuoc->Hinh = $hinh;
         }else{
                $goicuoc->Hinh="";
            }
        $goicuoc->NoiDung = $re->noidung;
    	$goicuoc->save();
    	return redirect('admin/goicuoc/them')->with('thongbao','Thêm thành công');
    }
    function getsua($id){
    	$khachhang = loaikh::all();
    	$dichvu = goidichvu::all();
    	$goicuoc = goicuoc::find($id);
    	return view('admin.goicuoc.sua',['dichvu'=>$dichvu,'khachhang'=>$khachhang,'goicuoc'=>$goicuoc]);
    }
    function postsua(Request $re,$id){
    	$this->validate($re,['ten'=>'required|unique:goicuoc,Ten','tomtat'=>'required','dichvu'=>'required','noidung'=>'required'],
    		['ten.required'=>'Gói cước không được bỏ trống','ten.unique'=>'gói cước đã tồn tại','tomtat.required'=>'Giới thiệu không được bỏ trống','dichvu.required'=>'Bạn chưa chọn gói dịch vụ','noidung.required'=>'Nội dung không được bỏ trống']);
    	$goicuoc =goicuoc::find($id);
    	$goicuoc->Ten = $re->ten;
    	$goicuoc->TomTat = $re->tomtat;
        $goicuoc->idGoiDichVu = $re->dichvu;
    	 if($re->hasFile('hinh')){
         	    $file = $re->file('hinh');
                $name = $file->getClientOriginalName();              
                $hinh = str_random(4).'_'.$name;
               //echo $hinh;
                $file->move("upload/goicuoc",$hinh);
                $goicuoc->Hinh = $hinh;
         }else{
                $goicuoc->Hinh="";
            }
        $goicuoc->NoiDung = $re->noidung;
    	$goicuoc->save();
    	return redirect('admin/goicuoc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    function getxoa($id){
    	$goicuoc = goicuoc::find($id);
    	$goicuoc->delete();
    	return redirect('admin/goicuoc/danhsach')->with('thongbao','Xóa thành công');
    }
}

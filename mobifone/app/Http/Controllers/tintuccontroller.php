<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuc;
use App\loaitin;
class tintuccontroller extends Controller
{
     public function getdanhsach(){
       $tintuc = tintuc::all();
       return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    } 
    function getthem(){
    	$loaitin = loaitin::all();
    	return view('admin.tintuc.them',['loaitin'=>$loaitin]);
    }
    function postthem(Request $re){
    	$this->validate($re,['tieude'=>'required|unique:tintuc,TieuDe','tomtat'=>'required','noidung'=>'required'],
    		['tieude.required'=>'Tiêu đề không được bỏ trống','tieude.unique'=>'Tên tiêu đề đã tồn tại','tomtat.required'=>'Tóm tắt không được bỏ trống','noidung.required'=>'Nội dung không được bỏ trống']);

    	$tintuc = new tintuc;
    	$tintuc->TieuDe = $re->tieude;
    	$tintuc->idLoaiTin = $re->loaitin;
    	$tintuc->TomTat = $re->tomtat;
    	$tintuc->NoiDung = $re->noidung;
    	 if($re->hasFile('hinhanh')){
    	 	
         	     $file = $re->file('hinhanh');
                 $name = $file->getClientOriginalName();              
                 $hinh = str_random(4).'_'.$name;
                 echo $hinh;
                 $file->move("upload/tintuc",$hinh);
                 $tintuc->Hinh = $hinh;
         }else{
                 $tintuc->Hinh="";
         	echo "không";
            }
    	         $tintuc->save();
    	         return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
    }
    function getsua($id){
    	$tintuc = tintuc::find($id);
    	$loaitin = loaitin::all();
    	return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin]);
    }
    function postsua(Request $re,$id){
    	$this->validate($re,['tieude'=>'required|unique:tintuc,TieuDe','tomtat'=>'required','noidung'=>'required'],
    		['tieude.required'=>'Tiêu đề không được bỏ trống','tieude.unique'=>'Tên tiêu đề đã tồn tại','tomtat.required'=>'Tóm tắt không được bỏ trống','noidung.required'=>'Nội dung không được bỏ trống']);

    	$tintuc =  tintuc::find($id);
    	$tintuc->TieuDe = $re->tieude;
    	$tintuc->idLoaiTin = $re->loaitin;
    	$tintuc->TomTat = $re->tomtat;
    	$tintuc->NoiDung = $re->noidung;
    	if($re->hasFile('hinh')){
         	    $file = $re->file('hinh');
                $name = $file->getClientOriginalName();              
                $hinh = str_random(4).'_'.$name;
                $file->move("upload/tintuc",$hinh);
                $tintuc->Hinh = $hinh;
         }else{
                $tintuc->Hinh="";
         }
    	$tintuc->NoiBat = $re->noibat;
    	$tintuc->save();
    	return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    function getxoa($id){
    	$tintuc = tintuc::find($id);
    	$tintuc->delete();
    	return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
    }
}

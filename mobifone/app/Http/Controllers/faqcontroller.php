<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faq;
class faqcontroller extends Controller
{
    public function getdanhsach(){
    	$faq = faq::all();
    	return view('admin.faq.danhsach',['faq'=>$faq]);
    }
    function getthem(){
    	return view('admin.faq.them');
    }
    function postthem(Request $re){
    	$this->validate($re,['tieude'=>'required'],['tieude.required'=>'Tiêu đề không được bỏ trống']);
    	$faq = new faq;
    	$faq->TieuDe = $re->tieude;
    	$faq->save();
         return redirect('admin/faq/them')->with('thongbao','Thêm thành công');
    }
    function getsua($id){
    	$faq = faq::find($id);
    	return view('admin.faq.sua',['faq'=>$faq]);
    }
    function postsua(Request $re,$id){
    	$this->validate($re,['tieude'=>'required'],['tieude.required'=>'Tiêu đề không được bỏ trống']);
    	$faq = faq::find($id);
    	$faq->TieuDe = $re->tieude;
    	$faq->save();
         return redirect('admin/faq/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    function getxoa($id){
    	$faq = faq::find($id);
    	$faq->delete();
    	return redirect('admin/faq/danhsach')->with('thongbao','Xóa thành công');
    }
}
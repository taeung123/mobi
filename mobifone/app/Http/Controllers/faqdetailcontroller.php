<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faqdetail;
use App\faq;
class faqdetailcontroller extends Controller
{
    public function getdanhsach(){
         $detail = faqdetail::all();
         return view('admin.faq-detail.danhsach',['detail'=>$detail]);
    }
    function getthem(){
    	$faq = faq::all();
    	return view('admin.faq-detail.them',['faq'=>$faq]);
    }
    function postthem(Request $re){
    	$this->validate($re,['faq'=>'required','cauhoi'=>'required|unique:chitietfaq,CauHoi','traloi'=>'required'],['faq.required'=>'bạn chưa chọn chủ đề FAQ','cauhoi.required'=>'Câu hỏi không được bỏ trống','cauhoi.unique'=>'Câu hỏi đã tồn tại','traloi.required'=>'Câu trả lời không được bỏ trống']);
    	$detail = new faqdetail;
    	$detail->CauHoi = $re->cauhoi;
    	$detail->TraLoi = $re->traloi;
    	$detail->idFAQ = $re->faq;
    	$detail->save();
    	return redirect('admin/faq-detail/them')->with('thongbao','Thêm thành công');
    }
    function getsua($id){
    	$faq = faq::all();
    	$detail = faqdetail::find($id);
    	return view('admin.faq-detail.sua',['detail'=>$detail,'faq'=>$faq]);
    }
    function postsua(Request $re,$id){
           $this->validate($re,['faq'=>'required','cauhoi'=>'required|unique:chitietfaq,CauHoi','traloi'=>'required'],['faq.required'=>'bạn chưa chọn chủ đề FAQ','cauhoi.required'=>'Câu hỏi không được bỏ trống','cauhoi.unique'=>'Câu hỏi đã tồn tại','traloi.required'=>'Câu trả lời không được bỏ trống']);
    	$detail = faqdetail::find($id);
    	$detail->CauHoi = $re->cauhoi;
    	$detail->TraLoi = $re->traloi;
    	$detail->idFAQ = $re->faq;
    	$detail->save();
    	return redirect('admin/faq-detail/sua/'.$id)->with('thongbao','Sửa thành công');  
    }
    function getxoa($id){
    	$detail = faqdetail::find($id);
    	$detail->delete();
    	return redirect('admin/faq-detail/danhsach')->with('thongbao','Xóa thành công');
    }
}

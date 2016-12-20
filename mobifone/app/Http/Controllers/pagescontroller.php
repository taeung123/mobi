<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\goidichvu;
use App\goicuoc;
use App\loaitin;
use App\tintuc;
use App\loaikh;
use App\faq;
use App\faqdetail;
class pagescontroller extends Controller
{ 
	function __construct(){
		$goidichvu = goidichvu::all();
 
		$slide = goicuoc::where('idGoiDichVu',1)->get();
    $slidedn = goicuoc::where('idGoiDichVu',3)->get();
		$loaitin = loaitin::all();
    $loaikh = loaikh::all();
    $tintuc = tintuc::all();
		    view()->share('goidichvu',$goidichvu);
        view()->share('loaitin',$loaitin);
        view()->share('slide',$slide);
        view()->share('slidedn',$slidedn);
        view()->share('loaikh',$loaikh);
        view()->share('tintuc',$tintuc);
	}
    public function gettrangchu(){
    	return view('pages.trangchu');
    }
    function gettrangchudn(){
    	return view ('pages.trangchudn');
    }
     public function gettrangchu1($id){
     	 if($id==1) return redirect('trangchu');
      else  return redirect('khdn/trangchu');
      }
      function getgoicuoc($id){
        $goidv = goidichvu::find($id);
        $goicuoc = goicuoc::where('idGoiDichvu',$id)->paginate(3);
        return view('pages.goicuoc',['goidv'=>$goidv,'goicuoc'=>$goicuoc]);
      }
      function getctgoicuoc($id){
          $goicuoc = goicuoc::find($id);
          return view('pages.ctgoicuoc',['goicuoc'=>$goicuoc]);
      }
      function getloaitin($id){
          $loaitin1 = loaitin::find($id);
          $loaitin2 = tintuc::where('idLoaiTin',$id)->orderBy('created_at','desc')->paginate(5);
          return view('pages.loaitin',['loaitin2'=>$loaitin2,'loaitin1'=>$loaitin1]);
      }
      function gettintuc($id){
        $tintuc1 = tintuc::find($id);
        return view ('pages.tintuc',['tintuc1'=>$tintuc1]);
      }
           function getgoicuocdn($id){
        $goidv = goidichvu::find($id);
        $goicuoc = goicuoc::where('idGoiDichvu',$id)->paginate(3);
        return view('pages.goicuocdn',['goidv'=>$goidv,'goicuoc'=>$goicuoc]);
      }
        function getctgoicuocdn($id){
          $goicuoc = goicuoc::find($id);
          return view('pages.ctgoicuocdn',['goicuoc'=>$goicuoc]);
      }
            function getloaitindn($id){
          $loaitin1 = loaitin::find($id);
          $loaitin2 = tintuc::where('idLoaiTin',$id)->orderBy('created_at','desc')->paginate(5);
          return view('pages.loaitindn',['loaitin2'=>$loaitin2,'loaitin1'=>$loaitin1]);
      }
            function gettintucdn($id){
        $tintuc1 = tintuc::find($id);
        return view ('pages.tintucdn',['tintuc1'=>$tintuc1]);
      }
      function getfaq(){
          $faq = faq::all();
          $ctfaq = faqdetail::all();
          return view('pages.faq',['faq'=>$faq]);
      }
         function getfaqdn(){
          $faq = faq::all();
          $ctfaq = faqdetail::all();
          return view('pages.faqdn',['faq'=>$faq]);
      }
      function getgioithieu(){
        return view('pages.gioithieu');
      }
       function getgioithieudn(){
        return view('pages.gioithieudn');
      }
        function gettimkiem(Request $re){
        $tukhoa = $re->get("tukhoa");
        $goicuoc = goicuoc::where('Ten','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->take(50)->paginate(5);
        return view('pages.timkiem',['goicuoc'=>$goicuoc,'tukhoa'=>$tukhoa]);
       }
           function gettimkiemdn(Request $re){
        $tukhoa = $re->get("tukhoa");
        $goicuoc = goicuoc::where('Ten','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->take(50)->paginate(5);
        return view('pages.timkiemdn',['goicuoc'=>$goicuoc,'tukhoa'=>$tukhoa]);
       }
}

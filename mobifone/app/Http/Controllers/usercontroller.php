<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Auth;
class usercontroller extends Controller
{
    public function getdanhsach(){
        $user = user::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }
    function getthem(){
    	return view('admin.user.them');
    }
    function postthem(Request $re){
    	$this->validate($re,['ten'=>'required|unique:users,name|min:3|max:50','email'=>'required|unique:Users,email|email','pass'=>'required','repass'=>'required|same:pass'],
    		['ten.required'=>'Tên không được bỏ trống','ten.unique'=>'Tên người dùng đã tồn tại','ten.min'=>'Tên phải nhiều hơn 3 kí tự và nhỏ hơn 50 kí tự','ten.max'=>'Tên phải nhiều hơn 3 kí tự và nhỏ hơn 50 kí tự',
    		'email.required'=>'email không được bỏ trống','email.unique'=>'Email đã tồn tại ','email.email'=>'Không đúng định dạng email',
    		'pass.required'=>'mật khẩu không được bỏ trống',
    		'repass.required'=>'Nhập lại mật khẩu không được bỏ trống','repass.same'=>'Nhập lại mật khẩu không đúng']);
    	$user = new user;
    	$user->name = $re->ten;
    	$user->email = $re->email;
    	$user->password = bcrypt($re->pass);
    	$user->quyen = $re->quyen;
    	$user->save();
    	return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }
    function getsua($id){
    	$user = user::find($id);
    	return view('admin.user.sua',['user'=>$user]);
    }
    function postsua(Request $re,$id){
    		$this->validate($re,['ten'=>'required|unique:users,name|min:3|max:50','pass'=>'required','repass'=>'required|same:pass'],
    		['ten.required'=>'Tên không được bỏ trống','ten.unique'=>'Tên người dùng đã tồn tại','ten.min'=>'Tên phải nhiều hơn 3 kí tự và nhỏ hơn 50 kí tự','ten.max'=>'Tên phải nhiều hơn 3 kí tự và nhỏ hơn 50 kí tự',
    		'pass.required'=>'mật khẩu không được bỏ trống',
    		'repass.required'=>'Nhập lại mật khẩu không được bỏ trống','repass.same'=>'Nhập lại mật khẩu không đúng']);
    	$user = user::find($id);
    	$user->name = $re->ten;
    	$user->password = bcrypt($re->pass);
    	$user->quyen = $re->quyen;
    	$user->save();
    	return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    function getxoa($id){
    	$user = user::find($id);
    	$user->delete();
    	return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    }
    function getdangnhap(){
    	return view('admin.dangnhap');
    }
    function postdangnhap(Request $re){

          $this->validate($re,['email'=>'required','password'=>'required'],['email.required'=>'email không được bỏ trống','password.required'=>'password không được bỏ trống']);

          if(Auth::Attempt(['email'=>$re->email,'password'=>$re->password])){
          	    return redirect('admin/loaikh/danhsach');
          }
          else{
          	    return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thất bại');
          }        	
    }
    function getdangxuat(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}

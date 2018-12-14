<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function getDangnhapAdmin(){
    	return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request){
    	$this->validate($request,
    		[
    		   'email'=>'required',
    		   'password'=>'required|min:3|max:32'
    		],[
    		   'email.required'=>'Ban can nhap email',
    		   'password.required'=>'Ban can nhap password',
    		   'password.min'=>'Password phai co tu 3 den 32 ky tu',
    		   'password.max'=>'Password phai co tu 3 den 32 ky tu'
    		]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
        	return redirect('admin/sanpham/danhsach');
        }
        else
        {
        	return redirect('admin/dangnhap')->with('thongbao','Dang nhap khong thanh cong, tai khoan khong ton tai');
        }
    }
    public function getDangxuatAdmin()
    {
    	Auth::logout();
    	return redirect('admin/dangnhap');
    }
    public function getDanhsach(){
        $user = User::all();
        return view('admin.user.danhsach',compact('user'));
    }
    public function getThem(){
        return view('admin.user.them');
    }
    public function postThem(Request $request){
        $this->validate($request,
            [
               'ten'=>'required|min:3',
               'email'=>'required|email',
               'diachi'=>'required',
               'sdt'=>'required|min:10',
               'password'=>'required|min:3',
               'repassword'=>'required|min:3|same:password',
               
            ],[
               'ten.required'=>'Bạn cần điền tên user',
               'ten.min'=>'Tên user có ít nhất 3 ký tự',
               'email.required'=>'Bạn cần điền email user',
               'email.email'=>'Bạn cần điền đúng dạng email',
               'diachi.required'=>'Bạn cần điền địa chỉ user',
               'sdt.required'=>'Bạn cần điền số điện thoại user',
               'sdt.min'=>'Số điện thoại user có ít nhất 10 ký tự',
               'password.required'=>'Bạn cần điền password user',
               'password.min'=>'Password user có ít nhất 3 ký tự',
               'repassword.required'=>'Bạn cần điền lại password cho user',
               'repassword.min'=>'Password user có ít nhất 3 ký tự',
               'repassword.same'=>'Password nhập lại không đúng'
            ]);
        $user = new User;
        $user->full_name = $request->ten;
        $user->quyen = $request->quyen;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->sdt;
        $user->address = $request->diachi;

        $user->save();
        return back()->with('thongbao','Bạn đã thêm user thành công');
    }
    public function getSua($id){
        $user = User::find($id);
        return view('admin.user.sua',compact('user'));
    }
    public function postSua($id, Request $request){
        if($request->check == 'on'){
            $this->validate($request,
            [
               'ten'=>'required|min:3',
               'email'=>'required|email',
               'diachi'=>'required',
               'sdt'=>'required|min:10',
               'password'=>'required|min:3',
               'repassword'=>'required|min:3|same:password',
               
            ],[
               'ten.required'=>'Bạn cần điền tên user',
               'ten.min'=>'Tên user có ít nhất 3 ký tự',
               'email.required'=>'Bạn cần điền email user',
               'email.email'=>'Bạn cần điền đúng dạng email',
               'diachi.required'=>'Bạn cần điền địa chỉ user',
               'sdt.required'=>'Bạn cần điền số điện thoại user',
               'sdt.min'=>'Số điện thoại user có ít nhất 10 ký tự',
               'password.required'=>'Bạn cần điền password user',
               'password.min'=>'Password user có ít nhất 3 ký tự',
               'repassword.required'=>'Bạn cần điền lại password cho user',
               'repassword.min'=>'Password user có ít nhất 3 ký tự',
               'repassword.same'=>'Password nhập lại không đúng'
            ]);
            $user = User::find($id);
            $user->full_name = $request->ten;
            $user->quyen = $request->quyen;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone = $request->sdt;
            $user->address = $request->diachi;

            $user->save();
            return back()->with('thongbao','Bạn đã thêm user thành công');
        }
        else{
            $this->validate($request,
            [
               'ten'=>'required|min:3',
               'email'=>'required|email',
               'diachi'=>'required',
               'sdt'=>'required|min:10'             
            ],[
               'ten.required'=>'Bạn cần điền tên user',
               'ten.min'=>'Tên user có ít nhất 3 ký tự',
               'email.required'=>'Bạn cần điền email user',
               'email.email'=>'Bạn cần điền đúng dạng email',
               'diachi.required'=>'Bạn cần điền địa chỉ user',
               'sdt.required'=>'Bạn cần điền số điện thoại user',
               'sdt.min'=>'Số điện thoại user có ít nhất 10 ký tự',
            ]);
            $user = User::find($id);
            $user->full_name = $request->ten;
            $user->quyen = $request->quyen;
            $user->email = $request->email;
            $user->phone = $request->sdt;
            $user->address = $request->diachi;

            $user->save();
            return back()->with('thongbao','Bạn đã thêm user thành công');
        }
    }
    public function getXoa($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('thongbao','Bạn đã xóa user thành công');
    }
}

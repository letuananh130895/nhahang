<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bill;

class CustomerController extends Controller
{
    //
    public function getDanhsach(){
    	$customer = Customer::all();
    	return view('admin.customer.danhsach',compact('customer'));
    }
    public function getThem(){
    	return view('admin.customer.them');
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    		   'ten'=>'required|min:3',
    		   'email'=>'required|email',
    		   'diachi'=>'required',
    		   'sdt'=>'required|min:10',
    		   'note'=>'required'
    		],[
    		   'ten.required'=>'Bạn cần điền tên khách hàng',
    		   'ten.min'=>'Tên khách hàng có ít nhất 3 ký tự',
    		   'email.required'=>'Bạn cần điền email khách hàng',
    		   'email.email'=>'Bạn cần điền đúng dạng email',
    		   'diachi.required'=>'Bạn cần điền địa chỉ khách hàng',
    		   'sdt.required'=>'Bạn cần điền số điện thoại khách hàng',
    		   'sdt.min'=>'Số điện thoại khách hàng có ít nhất 10 ký tự',
    		   'note.required'=>'Bạn cần điền ghi chú khách hàng'
    		]);
    	$customer = new Customer;
    	$customer->name = $request->ten;
    	$customer->gender = $request->gioitinh;
    	$customer->email = $request->email;
    	$customer->address = $request->diachi;
    	$customer->phone_number = $request->sdt;
    	$customer->note = $request->note;
    	$customer->save();
    	return back()->with('thongbao','Bạn đã thêm thành công khách hàng');
    }
    public function getSua($id){
    	$customer = Customer::find($id);
    	return view('admin.customer.sua',compact('customer'));
    }
    public function postSua($id,Request $request){
    	$this->validate($request,
    		[
    		   'ten'=>'required|min:3',
    		   'email'=>'required|email',
    		   'diachi'=>'required',
    		   'sdt'=>'required|min:10',
    		   'note'=>'required'
    		],[
    		   'ten.required'=>'Bạn cần điền tên khách hàng',
    		   'ten.min'=>'Tên khách hàng có ít nhất 3 ký tự',
    		   'email.required'=>'Bạn cần điền email khách hàng',
    		   'email.email'=>'Bạn cần điền đúng dạng email',
    		   'diachi.required'=>'Bạn cần điền địa chỉ khách hàng',
    		   'sdt.required'=>'Bạn cần điền số điện thoại khách hàng',
    		   'sdt.min'=>'Số điện thoại khách hàng có ít nhất 10 ký tự',
    		   'note.required'=>'Bạn cần điền ghi chú khách hàng'
    		]);
    	$customer = Customer::find($id);
    	$customer->name = $request->ten;
    	$customer->gender = $request->gioitinh;
    	$customer->email = $request->email;
    	$customer->address = $request->diachi;
    	$customer->phone_number = $request->sdt;
    	$customer->note = $request->note;
    	$customer->save();
    	return back()->with('thongbao','Bạn đã sửa khách hàng thành công');
    }
    public function getXoa($id){
        $bill = Bill::where('id_customer',$id)->get();
        if(count($bill) != 0){
            return back()->with('loi','Khách hàng có trong đơn hàng không được phép xóa');
        }
    	$customer = Customer::find($id);
    	$customer->delete();
    	return back()->with('thongbao','Bạn đã xóa khách hàng thành công');
    }
}

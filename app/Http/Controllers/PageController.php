<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
// use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\News;
use App\Contact;
use App\Introduce;
use App\ProductDetail;
use Hash;
use Auth;
use Cart;
use Illuminate\Support\Facades\DB;
class PageController extends Controller
{
	//function __construct()
	//{
	//	$type_product = ProductType::all();
	//	View()->share('type_product',$type_product);
	//} 
    //
    public function getIndex(){
    	$slide = Slide::all();
    	$new_product = Product::where('new',1)->paginate(8);
    	$sale_product = Product::where('promotion_price','<>',0)->paginate(12);
        //$new = News::all();
    	return View('page/trangchu',compact('slide','new_product','sale_product'));
    }
    public function getLoaiSanPham($id){
    	$sp_theoloai = Product::where('id_type',$id)->paginate(3);
    	$sp_khac = Product::where('id_type','<>',$id)->paginate(3);
    	$loaisanpham = ProductType::where('id',$id)->first();
        $type_product = ProductType::all();
    	return View('page/loai_sanpham',compact('sp_theoloai','sp_khac','loaisanpham','type_product'));
    }

    public function getChiTiet($id){
    	$sanpham = Product::where('id',$id)->first();
    	$sanpham_cungloai = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $sanpham_cungloai_sall = Product::where('id_type',$sanpham->id_type)->Where('promotion_price','<>',0)->take(3)->get();
        $sanphamchitiet = ProductDetail::where('id_product', $id)->first();
        
    	return View('page/chitiet_sanpham',compact('sanpham','sanpham_cungloai','sanpham_cungloai_sall','sanphamchitiet'));
    }

    public function getLienHe(){
    	return View('page/lienhe');
    }
    public function postLienHe(Request $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->title = $request->subject;
        $contact->content = $request->message;
        $contact->save();
        return back()->with('thongbao','Cảm ơn bạn đã quan tâm, chúng tối sẽ sớm liên lạc với bạn.');
    }
    public function getGioiThieu(){
        $intro = Introduce::all();
    	return View('page/gioithieu',compact('intro'));
    }


    public function getAddToCart($id, Request $req)
    {
        $product = DB::table('products')->where('id',$id)->first();
        if($product->promotion_price == 0){
            $price = $product->unit_price;
        }else{
            $price = $product->promotion_price;
        }
        Cart::add(array('id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $price,
            'options' => array('img' => $product->image, 'unit_price' => $product->unit_price, 'promotion_price' => $product->promotion_price)));

        return redirect()->back();
        
        // $product = Product::find($id);
        // $oldCart = Session('cart')?Session::get('cart'):null;
        // $cart = new Cart($oldCart);
        // $cart->add($product,$id);

        // $req->session()->put('cart',$cart);
        // return redirect()->back();
    }
    public function postAddToCart($id, Request $request){
        $product = DB::table('products')->where('id',$id)->first();
        if($product->promotion_price == 0){
            $price = $product->unit_price;
        }else{
            $price = $product->promotion_price;
        }
        Cart::add(array('id' => $product->id, 'name' => $product->name, 'qty' => $request->soluong, 'price' => $price,
            'options' => array('img' => $product->image, 'unit_price' => $product->unit_price, 'promotion_price' => $product->promotion_price)));

        return back()->with('thongbao','Thêm sản phẩm thành công');
    }

    public function updateCart(Request $request){
            $mang = $request->soluong;
            $id = $request->rowId;
            for($i = 0; $i < count($mang); $i++){
                if($mang[$i] <= 0){
                    return back()->with('loi','Cập nhật thất bại, số lượng sản phẩm không được bằng 0 hoặc âm');
                }
            }
            $dem = 0;
            for($i = 0; $i < count($mang); $i++){
                Cart::update($id[$dem],$mang[$i]);
                $dem++;   
            }
            return back()->with('thongbao','Cập nhật đơn hàng thành công');
       
    }
    public function getDelItemCart($id)
    {
        // $oldCart = Session::has('cart')?Session::get('cart'):null;
        // $cart = new Cart($oldCart);
        // $cart->removeItem($id);
        // if(count($cart->items) > 0)
        // {
        //     Session::put('cart',$cart);
        // }
        // else
        // {
        //     Session::forget('cart');
        // }
        Cart::remove($id);
        return redirect()->back();
    }
    public function getCheckout()
    {
        return View('page/dathang');
    }
    public function postCheckout(Request $req)
    {
        $content = Cart::content();
        $total = Cart::subtotal();
        $oldCustomer = Customer::where('email',$req->email)->first();
        if(!isset($oldCustomer)){
            $customer = new Customer;
            $customer->name = $req->name;
            $customer->gender = $req->gender;
            $customer->email = $req->email;
            $customer->address = $req->address;
            $customer->phone_number = $req->phone;
            $customer->note = $req->note;
            $customer->save();
            $idCustomer = $customer->id;
        }else{
            $idCustomer = $oldCustomer->id;
        }

        $bill = new Bill;
        $bill->id_customer = $idCustomer;
        $bill->date_order = date('Y-m-d');
        $bill->total = $total;
        $bill->payment = $req->payment_method;
        $bill->note =  $req->note;

        $bill->save();

        foreach($content as $value)
        {
            //var_dump($value->options->promotion_price);die;
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $value->id;
            $bill_detail->quantity = $value->qty;
            if($value->options->promotion_price == 0){
                $bill_detail->unit_price = $value->options->unit_price;
            }
            $bill_detail->unit_price = $value->options->promotion_price;
            $bill_detail->status = 0;
            $bill_detail->save();
        }
        Cart::destroy();
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function getDangnhap()
    {
        return View('page/dangnhap');
    }
    public function postDangnhap(Request $re)
    {
        $this->validate($re,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
            ],[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạnh',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Password ít nhất phải 6 ký tự',
            'password.max'=>'Password không quá 20 ký tự'
            ]);
        $credentials = array('email'=>$re->email, 'password'=>$re->password);
        if(Auth::attempt($credentials))
        {
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else
        {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }

    }
    public function getDangxuat()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }

    public function getDangky()
    {
        return View('page/dangky');
    }
    public function postDangky(Request $re)
    {
        $this->validate($re,[
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            're_password'=>'required|same:password'
            ],[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Vui lòng nhập đúng định danghj email',
            'email.unique'=>'Email đã có người sử dụng',
            'password.required'=>'Vui lòng nhập password',
            're_password.same'=>'Nhập lại mật khẩu không đúng',
            'password.min'=>'Password phải có ít nhất 9 ký tự',
            'password.max'=>'Password  có tối đa 20 ký tự'
            ]);
        $user = new User;
        $user->full_name = $re->fullname;
        $user->quyen = 0;
        $user->email = $re->email;
        $user->password = Hash::make($re->password);
        $user->phone = $re->phone;
        $user->address = $re->address;
        $user->save();

        return redirect()->back()->with('thongbao','Đăng ký thành công');

    }

    public function getTimkiem(Request $re)
    {
        $product = Product::where('name','like','%'.$re->key.'%')->orWhere('unit_price',$re->key)->paginate(6);
        return View('page/timkiem',compact('product'));
    }
}

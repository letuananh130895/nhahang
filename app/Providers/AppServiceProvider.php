<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
// use App\Cart;
use Session;
use Cart;
use App\Customer;
use App\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header',function($view){
            $type_product = ProductType::all();
            
            $view->with('type_product',$type_product);
        });
        view()->composer('footer',function($view){
            $type_product = ProductType::all();
            
            $view->with('type_product',$type_product);
        });
        view()->composer('footer',function($view){
            $loai_product = ProductType::all()->count();
            $product = Product::all()->count();
            $customer = Customer::all()->count();
            $view->with(['product' => $product, 'customer' => $customer, 'loai_product' => $loai_product]);
        });
        view()->composer('header',function($view){
            // if(Session('cart'))
            // {
            //     $oldCart = Session::get('cart');
            //     $cart = new Cart($oldCart);
            //     $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,
            //     'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            // }
            // Cart::destroy();
            $content = Cart::content();
            $total = Cart::subtotal();
            $count = Cart::count();
            $view->with(['content' => $content, 'total' => $total, 'count' => $count]);
        });
        view()->composer('page/dathang',function($view){
            // if(Session('cart'))
            // {
            //     $oldCart = Session::get('cart');
            //     $cart = new Cart($oldCart);
            //     $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,
            //     'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            // }
            $content = Cart::content();
            $total = Cart::subtotal();
            $count = Cart::count();
            $view->with(['content' => $content, 'total' => $total, 'count' => $count]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

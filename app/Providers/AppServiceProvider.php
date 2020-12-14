<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TypeProducts;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $loai_sp = TypeProducts::all();
            $view->with('loai_sp',$loai_sp); 

        });
         view()->composer('header',function($view){
            //them sp vao gio hang
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart =  new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),'products_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);

        } 

        });
         view()->composer(['header','Page.dathang'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'products_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
    }
}

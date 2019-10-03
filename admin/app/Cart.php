<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Cart extends Model
{
    protected $table="cart";
    protected $fillable=['product_id','product_name','product_color','size','price','quantity','user_email','session'];
    // public static function cartCount(){
    //     if(Auth::check()){
    //         $user_email=Auth::User()->email;
    //         $cartCount=Cart::where('user_email',$user_email)->count();
    //     }
    //     return $cartCount;
    // }
}

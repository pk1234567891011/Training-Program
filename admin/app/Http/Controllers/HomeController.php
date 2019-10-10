<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    // \Session::put('success','Payment success');
    //         $user_email=Auth::User()->email;
    //         $user_id=Auth::User()->id;
    //         $order_id=Session::get('order_id');
                
    //         $userCart = Cart::where('user_email', $user_email)->delete();
    //         $email=$user_email;
    //         $productDetails=UserOrder::with('orders')->where('id',$order_id)->first();
    //         $productDetails=json_decode(json_encode($productDetails),true);
    //         $user_addresss=Address::where('userId', $user_id)->first();
               
    //         $messageData=[
    //                 'email'=>$user_email,
    //                 'productDetails'=>$productDetails,
    //                 'user_addresss'=>$user_addresss,
                    
    //         ];
              
    //         Mail::send('emails.order', $messageData,function ($message) use ($email) {
    //                 $message->to($email)->subject('Order Details');
    //         });
}

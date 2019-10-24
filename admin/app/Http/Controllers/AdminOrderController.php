<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserOrder;
use App\Address;
use App\Users;
use App\OrderDetails;
class AdminOrderController extends Controller
{
    public function customer()
    {
        $customer=Address::latest()->paginate(6);
        return view('admin_order.customer',compact('customer'));
    }

    public function orderdetails()
    {
        $order_details=OrderDetails::latest()->paginate(6);
        return view('admin_order.order_details',compact('order_details'));
    }
    
    public function userOrder()
    {
        $user_order=UserOrder::latest()->paginate(6);
        return view('admin_order.user_order',compact('user_order'));
    }
}

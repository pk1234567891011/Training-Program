@extends('frontend.home')
@section('content')
<?php use App\UserOrder; 

use App\Users;
use App\User;
?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('homes')}}">Home</a></li>
				  <li class="active">Thanks</li>
				</ol>
			</div>
		</div>
	</section> 
	<section id="do_action">
		<div class="container" align="center">
			<div class="heading">
				<h3>YOUR  ORDER HAS BEEN PLACED</h3>
				<p> Your order number is {{Session::get('order_id') }} and total payable amount is {{Session::get('grand_total')}} </p>            
				<p>Please make payment by clicking below button</p>
				<?php 
					$orderDetails=UserOrder::getOrderDetails(Session::get('order_id'));
					$getCountryCode=UserOrder::getCountryCode($orderDetails->billing_country);
					$user_id=Auth::User()->id;
					$userDetails=Users::where('id',$user_id)->first();
				?>
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="kumaripri6@gmail.com">
					<input type="hidden" name="item_name" value="{{ Session::get('order_id') }}">
					<input type="hidden" name="currency_code" value="INR">
					<input type="text" name="country" value="{{$getCountryCode->country_code}}">
					<input type="hidden" name="amount" value="{{ Session::get('grand_total') }}">
					<input type="hidden" name="first_name" value="{{$userDetails->firstname}}">
					<input type="text" name="last_name" value="{{$userDetails->lastname}}">
					<input type="text" name="address1" value="{{$orderDetails->billing_address}}">
					<input type="text" name="city" value="{{$orderDetails->billing_city}}">
					<input type="text" name="state" value="{{$orderDetails->billing_state}}">
					<input type="text" name="zip" value="{{$orderDetails->billing_pincode}}">
					<input type="text" name="email" value="{{$userDetails->email}}">
					<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Pay Now">
					<img alt="" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
				</form>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection

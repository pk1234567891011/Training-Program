@extends('admin.admin_template')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="pull-right">
			
			</div>
		</div>
	</div>
	@if($message=Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<div id="div_form">
        <form method="get" action="/orderdetailssearch">
            <input type="search" name="search" class="form-control" id="search"> 
            <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
        </form>
    </div>
	<div style="position: absolute;top: 191px;">
		<table class="table table-bordered" >
			<tr>
				<th >ID</th>
				<th >Order Id</th>
				<th >Product Id</th>
				<th >Quantity </th>
				<th >Amount</th>
				
			</tr>
			@foreach($order_details as $details)
				<tr>
					<td>{{$details->id}}</td>
					<td>{{$details->order_id}}</td>
					<td>{{$details->product_id}}</td>
					<td>{{$details->quantity}}</td>
					<td>{{$details->amount}}</td>
				
				</tr>
			@endforeach

		</table>
		{!! $order_details->links() !!}
	</div>
@endsection

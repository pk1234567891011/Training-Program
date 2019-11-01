@extends('admin.admin_template')
@section('content')

	@if($message=Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<div id="div_form">
        <form method="get" action="/tracksearch">
            <input type="search" name="search" class="form-control" id="search"> 
            <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
        </form>
    </div>
	<div class="table_div">
		<table class="table table-bordered" style="width: 100%">
			<tr>

				<th >Order Id</th>
				<th >User Id</th>
				<th>Transcation Id</th>
				<th >Grand Total</th>
				<th >Status</th>
				<th width="200px">ACTION</th>
			</tr>
			</thead>
			@foreach($order_details as $order)
				<tr>

					<td>{{$order->id}}</td>
					<td>{{$order->user_id}}</td>
					<td>{{$order->transcation_id}}</td>
					<td>{{$order->grand_total}}</td>
					<td>{{$order->status}}</td>
					<td>
						<a class="btn btn-xs btn-info" href="{{route('order.edit',$order->id)}}">edit</a>
					
					</td>
				</tr>
			@endforeach
		</table>
		{!! $order_details->links() !!}
	</div>
@endsection

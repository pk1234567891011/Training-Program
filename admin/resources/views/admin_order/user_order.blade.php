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
        <form method="get" action="/userordersearch">
            <input type="search" name="search" class="form-control" id="search"> 
            <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
        </form>
    </div>
	<div style="position: absolute;top: 191px;">
		<table class="table table-bordered" >
			<tr>
				<th >ID</th>
				<th >User Id</th>
				<th >Shiiping Method</th>
				<th >Grant Total </th>
			</tr>
			@foreach($user_order as $details)
				<tr>
					<td>{{$details->id}}</td>
					<td>{{$details->user_id}}</td>
					<td>{{$details->shipping_method}}</td>
					<td>{{$details->grand_total}}</td>
				</tr>
			@endforeach

		</table>
		{!! $user_order->links() !!}
	</div>
@endsection

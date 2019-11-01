@extends('admin.admin_template')
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="pull-right">
				<div class="create_div">
					<a  href="{{route('coupon.create')}}" class="create_link">Create Coupon</a>
				</div>
			</div>
		</div>
	</div>
	@if($message=Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<div id="div_form">
        <form method="get" action="/couponsearch">
            <input type="search" name="search" class="form-control" id="search"> 
            <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
        </form>
    </div>
	<div class="table_div">
		<table class="table table-bordered" >
			<tr>
				<th >Code </th>
				<th >Percentage off</th>
				<th >No. of uses</th>
				<th width="200px">ACTION</th>
			</tr>
			@foreach($coupon as $coupons)
				<tr>
					<td>{{$coupons->code}}</td>
					<td>{{$coupons->percent_off}}</td>
					<td>{{$coupons->no_of_uses}}</td>
					<td>
						<a class="btn btn-xs btn-info" href="{{route('coupon.edit',$coupons->id)}}">edit</a>
						{!! Form::open(['method'=>'DELETE','route'=>['coupon.destroy',$coupons->id],'style'=>'display:inline'])!!}
						{!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
						{!! Form::close()!!}
					</td>
				</tr>
			@endforeach
		</table>
		{!! $coupon->links() !!}
	</div>
@endsection

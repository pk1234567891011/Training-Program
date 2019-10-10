@extends('frontend.home')
@section('content')
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<strong>Whoops!!!</strong> There are some problems with your inputs.</br>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error}}</li>
				@endforeach
			</ul>

		</div>
	@endif
	@if(Session::has('flash_message_error'))
		<div class="alert alert-error">
			<p>{!! session('flash_message_error') !!}</p>
		</div>
	@endif
	<form  method="POST" action="{{url('track_details')}}">
		{{ csrf_field() }}
		<label>order id</label>
		<input type="text" name="order_id">
		<label>Email</label>
		<input type="email" name="email">
		<input type="submit" value="Track" class="btn btn-default">
	</form>
@endsection
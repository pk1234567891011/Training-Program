
@extends('admin_template')
@section('content')
<!-- <div class="row"> -->
	<!-- <div class="col-lg-12"> -->
		<!-- <h3>Simple laravel</h3> -->
	<!-- </div> -->
<!-- </div> -->
<div class="row">
	<div class="col-sm-12">
		<div class="pull-right">
			<div id="crdiv">
			
			</div>
		</div>
	</div>
</div>
@if($message=Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div id="d1">
    <button style="margin-bottom: 10px;background-color: #9fbc35;border-color: #9fbc35" class="btn btn-primary delete_all" data-url="{{ url('product') }}">Delete</button>
  </div>
<table class="table table-bordered" style="top:89px ;position: absolute; width: 78%;margin-left: -19px;">
	<thead style="padding-left: 20px ">
	<tr>
	
		<th >firstname</th>
		<th >lastname</th>
	    <th >email</th>
	    <th >status</th>
		<th width="300px">ACTION</th>
	</tr>
	</thead>
	@foreach($users as $user)
	<tr>
		<td ><input type="checkbox" name="checked_id[]"  class="sub_chk" data-id="{{$user->id}}"/></td>

		<td>{{$user->firstname}}</td>
		
		  
		<td>{{$user->lastname}}</td>
		<td>{{$user->email}}</td>
		  <td>{{$user->status}}</td>
		<td>
			
			<a class="btn btn-xs btn-info" href="{{route('edit',$user->id)}}">edit</a>
			

		</td>
	</tr>
	@endforeach


	
</table>
<br>
<br>
<br>
<br>

{!! $users->links() !!}
@endsection







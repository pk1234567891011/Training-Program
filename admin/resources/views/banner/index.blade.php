@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div class="create_div" >
            	<a class="create_link"  href="{{route('banner.create')}}"
           			>Create Banner</a>
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
    <form method="get" action="/bannersearch">
	    <input type="search" name="search" class="form-control" id="search"> 
	    <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
    </form>
</div>
<div class="table_div" >
	<table id="myTable" class="table table-bordered" >
		<tr>
			<th >Banner</th>
			<th >status</th>
			<th width="200px">ACTION</th>
		</tr>
		@foreach($banner as $banners)
			<tr>
				<td>
					<img src="{{ URL::to('/') }}{{ $banners->banner_path }}" class="img-thumbnail banner_image" /
					>
				</td>
				<td>{{$banners->status}}</td>
				<td>
					<a class="btn btn-xs btn-info" href="{{route('banner.edit',$banners->id)}}">edit</a>
					{!! Form::open(['method'=>'DELETE','route'=>['banner.destroy',$banners->id],'style'=>'display:inline'])!!}
					{!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
					{!! Form::close()!!}
				</td>
			</tr>
		@endforeach
	</table>
	{!! $banner->links() !!}
</div>
@endsection

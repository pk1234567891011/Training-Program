@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            <a  href="{{route('cms.create')}}" style="position: absolute;margin-left: -203px; top: 100px">Create Cms pages</a>
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
    <form method="get" action="/cmssearch">
        <input type="search" name="search" class="form-control" id="search"> 
        <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
    </form>
</div>
<div style="position: absolute;top: 191px;">
	<table class="table table-bordered" >
		<tr>
			<th >Title </th>
			<th >Description off</th>
			<th >URL</th>
			<th >Status</th>
			<th width="200px">ACTION</th>
		</tr>
		@foreach($cms_details as $cms)
			<tr>
				<td>{{$cms->title}}</td>
				<td>{{$cms->description}}</td>
				<td>{{$cms->url}}</td>
				<td>{{$cms->status}}</td>
				<td>
				<a class="btn btn-xs btn-info" href="{{route('cms.edit',$cms->id)}}">edit</a>
					{!! Form::open(['method'=>'DELETE','route'=>['cms.destroy',$cms->id],'style'=>'display:inline'])!!}
					{!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
					{!! Form::close()!!}
				</td>
			</tr>
		@endforeach
	</table>
	{!! $cms_details->links() !!}
</div>
@endsection

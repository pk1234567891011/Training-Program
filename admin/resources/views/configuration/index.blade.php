@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div class="create_div">
            <a  href="{{route('configuration.create')}}" class="create_link">Create Configuration</a>
            </div>
        </div>
    </div>
</div>
@if($message=Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
@endif
<div class="table_div">
	<table class="table table-bordered" >
		<tr>
			<th >Config Key</th>
			<th >Config Value</th>
			<th >status</th>
			<th width="200px">ACTION</th>
		</tr>
		@foreach($configuration as $configurationss)
			<tr>
				<td>{{$configurationss->conf_key}}</td>
				<td>{{$configurationss->conf_value}}</td>
				<td>{{$configurationss->status}}</td>
				<td>
					<a class="btn btn-xs btn-info" href="{{route('configuration.edit',$configurationss->id)}}">edit</a>
					{!! Form::open(['method'=>'DELETE','route'=>['configuration.destroy',$configurationss->id],'style'=>'display:inline'])!!}
					{!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
					{!! Form::close()!!}
				</td>
			</tr>
		@endforeach

	</table>
	{!! $configuration->links() !!}
</div>
@endsection

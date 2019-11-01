@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            	<a  href="{{route('category.create')}}" style="position: absolute;margin-left: -203px; top: 100px">Create Category</a>
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
    <form method="get" action="/categorysearch">
	    <input type="search" name="search" class="form-control" id="search"> 
	    <button type="submit" id="btnSearch" class="btn btn-primary"  >Search</button>
    </form>
   </div>
<div style="position: absolute;top: 191px;">
	<table class="table table-bordered" >
		<tr>
			<th >Category Name</th>
			<th >Parent Name</th>
			<th >status</th>
			<th width="200px">ACTION</th>
		</tr>
		@foreach ($categories as $category)
      <tr>
        
        <td>{{ $category->name }}</td>
        <td>
			@if($category->parent_id==0)
				{{ $category ->name}}
			@else
			{{ $category->parent_name }}
			@endif
        </td>
        <td>{{ $category->status }}</td>
        <td>
			<a class="btn btn-xs btn-info" href="{{ route('category.edit',$category->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $category->id],'id' => 'FormDeleteTime','style'=>'display:inline']) !!}

			{!! Form::submit('Delete', ['class' => 'btn  btn-xs btn-danger']) !!}

			{!! Form::close() !!}
          
        </td>
      </tr>
     
    @endforeach
	</table>
	{{$categories->links()}}
</div>
@endsection

@extends('product.master')
@section('content')
	<form method="post" action="{{url('product')}}" enctype="multipart/form-data">
		{{csrf_field()}}
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
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<label for="name">Product Name:</label>
					<input type="text" class="form-control" name="name">
				</div>
			</div>
			<br>
			<br>
			<div class="col-xs-12">
				<div class="form-group">
					<label for="price">Product Price:</label>
					<input type="text" class="form-control" name="price" >
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					<label for="image">Upload Image:</label>
					<input type="file" class="form-control" name="image" style="padding: 0px 5px" >
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					<label for="select">Select Category:</label>
					<select class="form-control" id="post" name="CID">
						<option value="">Select Category</option>
						@foreach($posts as $post)
							<option value="{{ $post->id}}">{{ $post->C_name }}</option>
						@endforeach
					</select>

				</div>
			</div>
			<div class="col-xs-12">
				<a class="btn btn-xs btn-success" href="{{route('product.index')}}">Back</a>
				<button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
			</div>
		</div>
		
	</form>
@endsection

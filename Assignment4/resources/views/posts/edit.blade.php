@extends('posts.master')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="pull-left">
			<h3>Edit Posts</h3>
		</div>
	</div>
	
</div>
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
{!! Form::model($post,['method'=>'PATCH','route'=>['posts.update',$post->id]])!!}
  @include('posts.form')
{!! Form::close()!!}
@endsection

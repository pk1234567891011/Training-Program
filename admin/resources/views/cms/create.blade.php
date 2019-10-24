@extends('admin.admin_template')
@section('content')

<form method="post" action="{{url('cms')}}" enctype="multipart/form-data">
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
            <strong>Title :</strong>
            {!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Description :</strong>
            {!! Form::text('description',null,['placeholder'=>'Description','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>URL :</strong>
            {!! Form::text('url',null,['placeholder'=>'URL','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Status :</strong>
            {!! Form::text('status',null,['placeholder'=>'Status','class'=>'form-control'])!!}
        </div>
    </div>
<div class="col-xs-12">
        <a class="btn btn-xs btn-success" href="{{route('cms.index')}}">Back</a>
        <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
    </div>
</form>
@endsection

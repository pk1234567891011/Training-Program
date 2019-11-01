<div class="row">
	<div class="col-xs-12">
		<div class="form-group">
			<strong>Name :</strong>
			{!! Form::text('name',null,['placeholder'=>'name','class'=>'form-control'])!!}
		</div>
	</div>
	 <div class="col-xs-12"> 
		<div class="form-group">
			<strong>Image :</strong>
			{!! Form::file('image',null,['placeholder'=>'image','class'=>'form-control','style'=>'height:150px'])!!}
		</div>
	</div>
	<div class="col-xs-12"> 
		<div class="form-group">
			<strong>Price :</strong>
			{!! Form::text('price',null,['placeholder'=>'price','class'=>'form-control'])!!}
		</div>
	</div>
	
	<div class="col-xs-12">
		<div class="form-group">
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

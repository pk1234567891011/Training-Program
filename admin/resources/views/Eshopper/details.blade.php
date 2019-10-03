@extends('frontend.home')
@section('content')
@if(Session::has('flash_message_error'))
<div class="alert alert-error">
	<p>{!! session('flash_message_error') !!}</p>
</div>
@endif
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
              @foreach($category as $categorys)
              @if($categorys->children->count())
                  
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$categorys->name}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$categorys->name}}
										</a>
									</h4>
								</div>
								<div id="{{$categorys->name}}" class="panel-collapse collapse">
									<div class="panel-body">

										<ul>
                    @foreach($categorys->children as $child)
											<li><a href="{{asset('/products/'.$child->name)}}">{{$child->name}} </a></li>
                      @endforeach
										</ul>
									</div>

								</div>
                @else
                @if($categorys->parent_id==0)
                <div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$categorys->name}}">
											<span class="badge pull-right"></span>
											{{$categorys->name}}
										</a>
									</h4>
								</div> 
                @endif
              @endif
              @endforeach

							</div>
						</div>
          </div>
        </div>
        
<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ URL::to('/') }}/products/{{ $product_image->image_name }}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
                            <form name="addtocartForm" id="addtocartForm" method="POST" action="{{url('add-cart')}}">
							{{ csrf_field() }}
								<input type="hidden" name="product_id" value="{{$productDetails->id}}">
								<input type="hidden" name="product_name" value="{{$productDetails->name}}">
								<input type="hidden" name="price" value="{{$productDetails->price}}">
								<input type="hidden" name="quantity" value="{{$productDetails->quantity}}">
								
								<div class="product-information"><!--/product-information-->
									<img src="{{asset('images/product-details/new.jpg')}}" class="newarrival" alt="" />
									<h2>{{$productDetails->name}}</h2>
									<p>ProductID:{{$productDetails->id}}</p>
									<img src="{{asset('images/product-details/rating.png')}}" alt="" />
									<span>
										<span>INR {{$productDetails->price}}</span>
										<label>Quantity:</label>
										<input type="text" value="{{$productDetails->quantity}}" />
										<button type="submit" class="btn btn-fefault cart" style="margin-left: -14px;margin-top: 14px;">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									</span>
									
									<a href=""><img src="{{asset('images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
							</form>
							</div>
							<form name="addtowishlistForm" id="addtowishlistForm" method="POST" action="{{url('add-wishlist')}}">
							{{ csrf_field() }}
							
								<input type="hidden" name="product_id" value="{{$productDetails->id}}">
								<button type="submit" class="btn btn-fefault cart" style="position: absolute;top: 266px;right: 26px;width: 125px;">
									<i class="fa fa-shopping-cart"></i>
											Add to Wishlist
								</button>
							</form>
						</div>
					</div><!--/product-details-->
					
					
					
				</div>
                </section>
                @endsection
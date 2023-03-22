@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />
								<h3></h3>
							</div>
							<!--<div id="similar-product" class="carousel slide" data-ride="carousel">
								
							
								    <div class="carousel-inner">

										<div class="item active">
										  <a href=""><img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt=""></a>
										  <a href=""><img src="{{URL::to('public/frontend/images/text1.png')}}" alt=""></a>
										   <a href=""><img src="{{URL::to('public/frontend/images/danhgia2.png')}}" alt=""></a>
										</div>
										
									</div>

							
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>-->

						</div>
						<div class="col-sm-6">
							<div class="product-information"><!--/product-information-->
								<img src="{{('public/frontend/images/rating.png')}}" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<img src="{{URL::to('public/frontend/images/rating.png')}}" alt="" />
								
								<form action="{{URL::to('/save-cart')}}" method="POST">
									@csrf
									<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_slug}}" class="cart_product_slug_{{$value->product_id}}">

                                          
								<span>
									<span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
								
									<label>Số lượng :  </label>
									<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
								</span>
								<input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
								</form>

								<p><b>Nhãn hàng :  </b> {{$value->brand_name}}</p>
								<p><b>Số lượng kho còn :  </b> {{$value->product_quantity}}</p>
								<p><b>Danh mục :  </b> {{$value->category_name}}</p>
								
								<!-- <a href=""><img src="{{URL::to('public/frontend/images/share.png')}}" class="share img-responsive"  alt="" /></a> -->
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
															
								<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!!$value->product_desc!!}</p>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$value->product_content!!}</p>
								
						
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Người Dùng</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:00 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>27 July 2022</a></li>
									</ul>
									
									<p><b>Đánh Giá - Nhận Xét Từ Khách Hàng</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Tên của bạn"/>
											<input type="email" placeholder="Địa chỉ Email"/>
										</span>
										<textarea name="" ></textarea>
										<b>Xếp hạng : </b> <img src="{{URL::to('public/frontend/images/rating.png')}}" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Đánh giá
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
	@endforeach
					
					  <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$relate->links()!!}
                      </ul>
                      <style type="text/css">
                      	.carousel-inner>.item>img, .carousel-inner>.item>a>img {
    display: block;
    height: auto;
    max-width: 25%;
    line-height: 1;
}
                      </style>

@endsection
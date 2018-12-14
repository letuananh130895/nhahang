@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
			</div>
			<div class="row">
					 @if(session('thongbao'))
                    <div class="alert alert-success">
                       <h5>{{session('thongbao')}}</h>
                    </div>
                    @endif
					</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index">Home</a> / <span>Chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
						<div class="single-item">
						@if($sanpham->promotion_price <> 0)
							<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						@endif
						    <div class="single-item-header">
							<img src="source/image/product/{{$sanpham->image}}" alt="" height="250px">
							</div>
						</div>
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->name}}</h2></p>
								<p class="single-item-price">
									@if($sanpham->promotion_price == 0)
										<span class="flash-sale">{{number_format($sanpham->unit_price)}} Đ</span>
												
									@else
									    <span class="flash-del">{{number_format($sanpham->unit_price)}} Đ</span>
										<span class="flash-sale">{{number_format($sanpham->promotion_price)}} Đ</span>

									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								@if($sanphamchitiet)
								<p>Mã sản phẩm :{{$sanphamchitiet->key_product}}</p>
								<b>{{$sanphamchitiet->compontent}}</b>
								@endif
							</div>
							<div class="space20">&nbsp;</div>
							
							<form action="add-to-cart/{{$sanpham->id}}" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="single-item-options">	
								<select class="wc-select" name="soluong">
									<option>số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<button type="submit" class="btn"><i class="fa fa-shopping-cart"></i></button>
								<div class="clearfix"></div>
							</div>
							</form>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả chi tiết</a></li>
							
						</ul>

						<div class="panel" id="tab-description">
							<p>{!! $sanpham->description !!}</p>
						</div>
						<div class="panel" id="tab-reviews">
							
						</div>
					</div>
					@if(Auth::user())
		                <div class="well">
		                    @if(session('thongbao'))
		                    <div class="alert alert-success">
		                        {{session('thongbao')}}
		                    </div>
		                    @endif
		                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
		                        <form action="comment/{{$sanpham->id}}" role="form" method="post">
		                        <input type="hidden" name="_token" value="{{csrf_token()}}">
		                            <div class="form-group">
		                                <textarea name="content" class="form-control" rows="3"></textarea>
		                            </div>
		                            <button type="submit" class="btn btn-primary">Gửi</button>
		                        </form>
		                </div>
                	@endif
                	  @foreach($sanpham->comment as $cm)
		                <!-- Comment -->
		                <div class="media">
		                    <a class="pull-left" href="#">
		                        <img class="media-object" src="http://placehold.it/64x64" alt="">
		                    </a>
		                    <div class="media-body">
		                        <h7 class="media-heading">{{$cm->user->full_name}}
		                            <small>{{$cm->created_at}}</small>
		                        </h7>
		                        <div><b>{{$cm->content}}</b></div>
		                    </div>
		                </div>
                	@endforeach
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm cùng loại</h4>

						<div class="row">
							@foreach($sanpham_cungloai as $cungloai)
							<div class="col-sm-4">
								<div class="single-item">
									@if($cungloai->promotion_price <> 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif

									<div class="single-item-header">
										<a href="chi-tiet-san-pham/{{$cungloai->id}}"><img src="source/image/product/{{$cungloai->image}}" alt="" height="150px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$cungloai->name}}</p>
										<p class="single-item-price">
											@if($cungloai->promotion_price == 0)
												<span class="flash-sale">{{number_format($cungloai->unit_price)}} Đ</span>
												
											@else
											    <span class="flash-del">{{number_format($cungloai->unit_price)}} Đ</span>
												<span class="flash-sale">{{number_format($cungloai->promotion_price)}} Đ</span>

											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="add-to-cart/{{$cungloai->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="chi-tiet-san-pham/{{$cungloai->id}}">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
							<div class="row">{{$sanpham_cungloai->links()}}</div>
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					
					<div class="widget">
						<h3 class="widget-title">Cùng loại - khuyến mãi</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($sanpham_cungloai_sall as $s)
								<div class="media beta-sales-item">
									<a class="pull-left" href="chi-tiet-san-pham/{{$s->id}}"><img src="source/image/product/{{$s->image}}" alt=""></a>
									<div class="media-body">
										{{$s->name}}
										<span class="beta-sales-price">{{$s->promotion_price}}</span>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
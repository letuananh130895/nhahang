<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Bánh ngọt Tuấn Anh</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0384 102 112</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						@if(Auth::check())
						   <li><a href="dang-xuat">Đăng xuất</a></li>
						   <li><a href="">Chào bạn {{Auth::user()->full_name}}</a></li>
						@else
						   <li><a href="dang-ky">Đăng kí</a></li>
						   <li><a href="dang-nhap">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
					<div id="SkypeButton_Call_hung_phamviet_1">
					 <script type="text/javascript">
					 Skype.ui({
					 "name": "call",
					 "element": "SkypeButton_Call_hung_phamviet_1",
					 "participants": ["hung_phamviet"]
					 });
				</script>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="tim-kiem">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> 
							Giỏ hàng (
							@if($count != 0)
							{{$count}}
							@else
							Trống
							@endif
							) <i class="fa fa-chevron-down"></i></div>
							@if($count != 0)
							<div class="beta-dropdown cart-body">
								
                                @foreach($content as $product)
								<div class="cart-item">
								    <a class="cart-item-delete" href="del-cart/{{$product->rowId}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product->options->img}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product->name}}</span>
											
											<span class="cart-item-amount">{{$product->qty}}*<span>
											@if($product->options->promotion_price == 0)
											{{number_format($product->options->unit_price)}}
											@else
											{{number_format($product->options->promotion_price)}}
											@endif
											</span></span>
										</div>
									</div>
								</div>
								@endforeach
								<div class="cart-caption">
								<center>
									<div class="cart-total text-center">Tổng tiền :
									<span class="cart-total-value">{!! ($total) !!} Đ</span></div>
								</center>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="dat-hang" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							@endif
						</div> 
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="#">Loại sản phẩm</a>
							<ul class="sub-menu">
							@foreach($type_product as $tp)
								<li><a href="loai-san-pham/{{$tp->id}}">{{$tp->name}}</a></li>
							@endforeach	
							</ul>
						</li>
						<li><a href="gioi-thieu">Giới thiệu</a></li>
						<li><a href="lien-he">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
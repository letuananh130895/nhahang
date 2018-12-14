<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Thống kê</h4>
						<div id="beta-instagram">
						<div>
						<div>
							<ul>
								<li><i class="fa fa-chevron-right"></i> Loại sản phẩm : {{$loai_product}}</li>
								<li><i class="fa fa-chevron-right"></i> Sản phẩm : {{$product}}</li>
								<li><i class="fa fa-chevron-right"></i> Khách hàng : {{$customer}}</li>							
							</ul>
						</div>
					</div>
				</div>
			</div>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Thông tin</h4>
						<div>
							<ul>
								<li><a href="gioi-thieu"><i class="fa fa-chevron-right"></i> giới thiệu</a></li>
								<li><a href="lien-he"><i class="fa fa-chevron-right"></i> liên hệ</a></li>
							
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
				 <div class="col-sm-10">
					<div class="widget">
						<h4 class="widget-title">Địa chỉ</h4>
						<div>
							<div class="contact-info">
								<i class="fa fa-map-marker"></i>
								Bánh ngọt Tuấn Anh
								Lê Trọng Tấn - Hà Nội
							</div>
						</div>
					</div>
				  </div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Bánh ưa thích?</h4>
						<form action="ua-thich" method="post">
							 <input type="hidden" name="_token" value="{{csrf_token()}}">
							@foreach($type_product as $t)
								<input type="radio" name="uathich" value="{{$t->id}}">{{$t->name}}
								<br/>
							@endforeach
							<button class="pull-right" type="submit">Gửi<i class="fa fa-chevron-right"></i></button>
						</form>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #footer -->
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2017</p>
			<p class="pull-right pay-options">
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->
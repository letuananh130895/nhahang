@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					
					<div class="row">
					 @if(session('thongbao'))
                    <div class="alert alert-success">
                       <h5>{{session('thongbao')}}</h>
                    </div>
                    @endif
					</div>
					<div class="row">
					@if(session('loi'))
                       <div class="alert alert-danger">
                           <h5>{{session('loi')}}</h5>
                       </div>
                    @endif
					</div>
					
					<div class="col-sm-6">
						<div class="your-order">
							@if($count)
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<form action="{{route('updatecart')}}" method="get">
										<input type="hidden" name="_token" value="{{csrf_token()}}">
										@foreach($content as $product)
										<!--  one item	 -->
											<div class="media">
												<img width="25%" src="source/image/product/{{$product->options->img}}" alt="" class="pull-left">
												<div class="media-body">
													<p class="font-large">{{$product->name}}</p>
													
												Đơn giá: 
												@if($product->options->promotion_price == 0)
												{{number_format($product->options->unit_price)}}
												@else
												{{number_format($product->options->promotion_price)}}
												@endif
												<br/>
													Số lượng: <input class="qty" type="text" name="soluong[]" value="{{$product->qty}}">
													<input type="hidden" name="rowId[]" value="{{$product->rowId}}">
													<br/>
													<button type="button" class="btn"><a style="color: firebrick" href="del-cart/{{$product->rowId}}">remove</a></button>
											</div>
										<!-- end one item -->
										@endforeach
										<input type="submit" class="btn" value="update" />
									</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{$total}} Đ</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							@endif
					<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							
						</div> <!-- .your-order -->
					</div>
					<div class="col-sm-6">
					<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-block">
								<label for="name">Họ tên*</label>
								<input type="text" id="name" name="name" placeholder="Họ tên" required>
							</div>
							<div class="form-block">
								<label>Giới tính </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="0" style="width: 10%"><span>Nữ</span>
											
							</div>

							<div class="form-block">
								<label for="email">Email*</label>
								<input type="email" id="email" name="email" required placeholder="expample@gmail.com">
							</div>

							<div class="form-block">
								<label for="adress">Địa chỉ*</label>
								<input type="text" id="adress" name="address" placeholder="Street Address" required>
							</div>
							

							<div class="form-block">
								<label for="phone">Điện thoại*</label>
								<input type="text" id="phone" name="phone" required>
							</div>
							
							<div class="form-block">
								<label for="notes">Ghi chú</label>
								<textarea id="notes" name="note"></textarea>
							</div>
							<div class="text-center"><button class="beta-btn primary" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</form>
					</div>
				</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
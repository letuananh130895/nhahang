@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3678.0141923553406!2d89.551518!3d22.801938!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8ff8ef7ea2b7%3A0x1f1e9fc1cf4bd626!2sPranon+Pvt.+Limited!5e0!3m2!1sen!2s!4v1407828576904" ></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					@if(session('thongbao'))
                       <div class="alert alert-success">
                           <h3>{{session('thongbao')}}</h3>
                       </div>
                    @endif
					<h2>Mẫu liên hệ</h2>
					<div class="space20">&nbsp;</div>
					<p>Không như các mẫu bánh có sẵn ở cửa hàng, thợ bánh phải cho thêm chất bảo quản để có thể giữ bánh từ 5 – 7 ngày sau khi làm. Bánh gato, bánh sinh nhật tại Giao Bánh Nhanh chỉ được làm sau khi khách hàng điện thoại đặt bánh. Lưu giữ tối đa hương vị của chiếc bánh gato tươi mềm, thơm ngon đúng chuẩn bánh Pháp.</p>
					<div class="space20">&nbsp;</div>
					<form action="lien-he" method="post" class="contact-form">	
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-block">
							<input name="name" type="text" placeholder="Tên (bắt buộc)">
						</div>
						<div class="form-block">
							<input name="email" type="email" placeholder="Email (bắt buộc)">
						</div>
						<div class="form-block">
							<input name="subject" type="text" placeholder="Tiêu đề">
						</div>
						<div class="form-block">
							<textarea name="message" placeholder="Nội dung"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi<i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						90-92 Lê Thị Riêng,Quận 1,<br>
						Bến Thành, <br>
						TP HCM
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Email liên hệ</h6>
					<p>
						miacake@gmail.com <br>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">SĐT liên hệ</h6>
					<p>
						0163 296 7751<br>
						0989320569
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
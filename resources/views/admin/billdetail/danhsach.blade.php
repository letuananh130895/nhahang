<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mia Cake</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">.table&amp;amp;gt;tbody&amp;amp;gt;tr&amp;amp;gt;td, .table&amp;amp;gt;tfoot&amp;amp;gt;tr&amp;amp;gt;td {  
vertical-align: middle;
}
 
@media screen and (max-width: 600px) { 
table#cart tbody td .form-control { 
width:20%; 
display: inline !important;
} 
 
.actions .btn { 
width:36%; 
margin:1.5em 0;
} 
 
.actions .btn-info { 
float:left;
} 
 
.actions .btn-danger { 
float:right;
} 
 
table#cart thead {
display: none;
} 
 
table#cart tbody td {
display: block;
padding: .6rem;
min-width:320px;
} 
 
table#cart tbody tr td:first-child {
background: #333;
color: #fff;
} 
 
table#cart tbody td:before { 
content: attr(data-th);
font-weight: bold; 
display: inline-block;
width: 8rem;
} 
 
table#cart tfoot td {
display:block;
} 
table#cart tfoot td .btn {
display:block;
}
}
</style>
</head>
<body>
<h2 class="text-center">Đơn hàng chi tiết</h2>
					@if(session('loi'))
                       <center class="alert alert-danger">
                           <h3>{{session('loi')}}</h3>
                       </center>
					@endif
					@if(session('thongbao'))
	                    <center class="alert alert-success">
	                       <h3>{{session('thongbao')}}</h3>
	                    </center>
                    @endif
<br />
<br />
<div class="container"> 
<form action="{{$bill->id}}/capnhat" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
 <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
   <tr> 
    <th style="width:50%">Tên sản phẩm</th> 
    <th style="width:10%">Tình trạng</th>
    <th style="width:10%">Giá</th> 
    <th style="width:8%">Số lượng</th> 
    <th style="width:22%" class="text-center">Thành tiền</th> 
    <th style="width:10%"> </th> 
   </tr> 
  </thead> 
  <tbody>
  	<?php
  	$tong = 0;
  	?>
  @foreach($billdetail as $b)
   <tr> 
   <td data-th="Product"> 
    <div class="row"> 
     <div class="col-sm-2 hidden-xs"><img src="http://miacake.com/upload/product/{{$b->product->image}}" alt="Sản phẩm 1" class="img-responsive" style="width:100px; height:70px;">
     </div> 
     <div class="col-sm-10"> 
      <h4 class="nomargin">{{$b->product->name}}</h4> 
      <p>
        @if($b->product->promotion_price > 0)
        Đã giảm giá
        @else
        Không giảm giá
        @endif
      </p>
     </div> 
    </div> 
   </td>
   @if($b->status == 2)
    <td data-th="Price"><a href="status/{{$b->id}}/{{$b->status}}">Đã giao</a></td>
   @endif
   @if($b->status == 1)
    <td data-th="Price"><a href="status/{{$b->id}}/{{$b->status}}">Chưa giao</a></td>
   @endif
   @if($b->status == 0)
    <td data-th="Price"><a href="status/{{$b->id}}/{{$b->status}}">Hết hàng</a></td>
   @endif
   <td data-th="Price">{{number_format($b->unit_price)}} Đ</td> 
   <td data-th="Quantity"><input class="form-control text-center" value="{{$b->quantity}}" type="number" name="arrSoLuong[]">
   </td> 
   <td data-th="Subtotal" class="text-center">{{number_format($b->quantity*$b->unit_price)}} Đ</td> 
   <td class="actions" data-th="">
    <a href="xoa/{{$b->id}}" class="btn btn-danger btn-sm" >Xóa</a>
   </td> 
  </tr> 
  <?php
  $tong += $b->quantity*$b->unit_price;
  ?>
  @endforeach
  
  </tbody><tfoot> 
   <tr>
   <td><a href="{{$bill->id}}/themsanpham" class="btn btn-warning"<i class="fa fa-angle-left"></i> Thêm sản phẩm</a>
    </td>
   </tr>
   <tr> 
    <td><a class="btn btn-warning"<i class="fa fa-angle-left"></i> Tổng tiền</a>
    </td> 
    <td colspan="2" class="hidden-xs"> </td> 
    <td></td>
    <td class="hidden-xs text-center"><strong><?php echo number_format($tong)." Đ"; ?></strong>
    </td> 
    <td><a href="xoadonhang/{{$b->bill->id}}" class="btn btn-danger btn-sm"<i class="fa fa-angle-right"></i>Xóa đơn hàng</a>
    </td> 
   </tr> 
  </tfoot> 
 </table>
 <input type="submit" value="Cập nhật đơn hàng chi tiết" class="btn btn-success btn-block" name="capnhat" />
 <div class="btn btn-success btn-block"><a href="../danhsach">Quay lại danh sách đơn hàng</a></div>
 </form>
   
</div>
</body>
</html>
</body>
</html>
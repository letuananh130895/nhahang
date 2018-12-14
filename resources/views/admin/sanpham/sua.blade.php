@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     @if(count($errors) >0)
                       <div class="alert alert-danger">
                          @foreach($errors->all() as $err)
                             {{$err}}<br/>
                          @endforeach
                       </div>
                    @endif

                    @if(session('thongbao'))
                       <div class="alert alert-success">
                           {{session('thongbao')}}
                       </div>
                    @endif
                    @if(session('loi'))
                       <div class="alert alert-danger">
                           {{session('loi')}}
                       </div>
                    @endif
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/sanpham/sua/{{$product->id}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="theloai" id="TheLoai">
                                   @foreach($producttype as $pt)
                                    <option
                                    @if($pt->id == $product->id_type)
                                     {{'selected'}}
                                    @endif
                                     value="{{$pt->id}}">{{$pt->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="ten" value="{{$product->name}}" placeholder="Nhập tên sản phẩm" />
                            </div>
                            
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" name="mota" class="form-control ckeditor" rows="3">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá gốc</label>
                                <input class="form-control" name="unitprice" value="{{$product->unit_price}}"/>
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="promotionprice" value="{{$product->promotion_price}}"/>
                            </div>
                            <div class="form-group">
                                <label>Hình thức</label>
                                <input class="form-control" name="hinhthuc" value="{{$product->unit}}"/>
                            </div>
                             
                            <div class="form-group">
                                 <label>Hình ảnh</label>
                                 <div><img width="100px" src="upload/product/{{$product->image}}"></div>
                                 <input type="file" name="hinh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="noibat" value="1" 
                                    @if($product->new == 1)
                                     {{'checked=""'}}
                                    @endif
                                    type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="noibat" value="0"
                                    @if($product->new == 0)
                                     {{'checked=""'}}
                                    @endif
                                    type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection


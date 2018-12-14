@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm khách hàng
                            <small>Thêm</small>
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
                        <form action="admin/customer/them" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           
                            
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="ten" placeholder="Nhập tên khách hàng" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <br/>
                                <input type="radio" name="gioitinh" value="1">Nam
                                <input type="radio" name="gioitinh" value="0">Nữ
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập email khách hàng" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="diachi" placeholder="Nhập địa chỉ khách hàng" />
                            </div>
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control" name="sdt" placeholder="Nhập số điện thoại khách hàng" />
                            </div>
                            
                            <div class="form-group">
                                <label>Note</label>
                                <textarea id="demo" placeholder="Nhập ghi chú cho khách hàng" name="note" class="form-control ckeditor" rows="3"></textarea>
                            </div>
                           
                           
                            <button type="submit" class="btn btn-default">Thêm</button>
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



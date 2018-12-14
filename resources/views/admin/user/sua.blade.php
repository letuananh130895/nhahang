@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa user
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
                        <form action="admin/user/sua/{{$user->id}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           
                            
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="ten" value="{{$user->full_name}}" placeholder="Nhập tên user" />
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <br/>
                                <input type="radio" name="quyen" value="1"
                                @if($user->quyen == 1)
                                {{'checked=""'}}
                                @endif
                                >Admin
                                <input type="radio" name="quyen" value="0"
                                @if($user->quyen == 0)
                                {{'checked=""'}}
                                @endif
                                >User
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$user->email}}" placeholder="Nhập email" />
                            </div>
                            <label>Đổi password</label>
                            <input type="checkbox" name="check" id="check" />
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" disabled="" class="form-control password" name="password" placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại password</label>
                                <input type="password" disabled="" class="form-control password" name="repassword" placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="diachi" value="{{$user->address}}" placeholder="Nhập địa chỉ" />
                            </div>
                            <div class="form-group">
                                <label>SĐT</label>
                                <input class="form-control" name="sdt" value="{{$user->phone}}" placeholder="Nhập số điện thoại" />
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
@section('script')
 <script type="text/javascript">
     $(document).ready(function(){
           $('#check').change(function(){
               if($(this).is(":checked"))
               {
                   $('.password').removeAttr('disabled');
               }
               else
               {
                   $('.password').attr('disabled','');
               }
           });
       });
 </script>
@endsection



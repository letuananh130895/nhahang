@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa new
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
                        <form action="admin/new/sua/{{$new->id}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           
                            
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="tieude" value="{{$new->title}}" placeholder="Nhập tiêu đề new" />
                            </div>
                            
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" name="noidung" class="form-control ckeditor" rows="3">{{$new->content}}</textarea>
                            </div>
                           
                             
                            <div class="form-group">
                                 <label>Hình ảnh</label>
                                 <div><img width="100px" src="upload/new/{{$new->image}}"></div>
                                </td>
                                 <input type="file" name="hinh" class="form-control">
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


@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
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
                        <form action="admin/bill/chitiet/{{$bill->id}}/themsanpham" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                 <label>Thể loại</label>
                                <select class="form-control" name="theloai" id="TheLoai">
                                    <option>Chọn thể loại</option>
                                   @foreach($producttype as $pt)
                                    <option value="{{$pt->id}}">{{$pt->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                <select class="form-control" name="sanpham" id="Sanpham">
                                   @foreach($product as $p)
                                    <option value="{{$p->id}}">{{$p->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input class="form-control" value="1" name="soluong" placeholder="Nhập tên sản phẩm" />
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
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#TheLoai').change(function(){
            var id = $(this).val();
            $.get('admin/ajax/theloai/' + id, function(data){
                $('#Sanpham').html(data);
            });

        });
    });
</script>
@endsection



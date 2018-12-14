@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                       {{session('thongbao')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Thể loại</th>
                                <th>Mô tả</th>
                                <th>Giá gốc</th>
                                <th>Giá khuyến mãi</th>
                                <th>Hình thức</th>
                                <th>Nổi bật</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $p)
                            <tr class="odd gradeX" align="center">
                                <td>{{$p->id}}</td>
                                <td><p>{{$p->name}}</p>
                                    <div><img width="100px" src="upload/product/{{$p->image}}"></div>
                                </td>
                                <td>{{$p->product_type->name}}</td>
                                <td>{!! $p->description !!}</td>
                                <td>{{$p->unit_price}}</td>
                                <td>{{$p->promotion_price}}</td>
                                <td>{{$p->unit}}</td>
                                <td>
                                @if($p->new == 1)
                                    {{'Có'}}
                                @else
                                    {{'Không'}}
                                @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$p->id}}" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/sanpham/sua/{{$p->id}}">Sửa</a></td>
                            </tr>
                        @endforeach   
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
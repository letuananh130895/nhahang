@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hóa đơn
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Khách hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng tiền</th>
                                <th>Hình thức thanh toán</th>
                                <th>Note</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bill as $b)
                            <tr class="odd gradeX" align="center">
                                <td>{{$b->id}}</td>
                                <td><p>{{$b->customer['name']}}</p></td>
                                <td>{{$b->date_order}}</td>
                                <td>{{$b->total}}</td>
                                <td>{{$b->payment}}</td>
                                <td>{!! $b->note !!}</td>
                                <td>
                                    @if($b->status == 0)
                                    {{'Chưa giao'}}
                                    @endif
                                    @if($b->status == 1)
                                    {{'Chưa giao hết'}}
                                    @endif
                                    @if($b->status == 2)
                                    {{'Đã giao'}}
                                    @endif
                                </td>  
                                <td><a href="admin/bill/chitiet/{{$b->id}}">chi tiết</a></td>                           
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/bill/xoa/{{$b->id}}" " onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/bill/sua/{{$b->id}}">Sửa</a></td>
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

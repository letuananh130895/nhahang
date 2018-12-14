@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
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
                                <th>Tên</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Note</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customer as $c)
                            <tr class="odd gradeX" align="center">
                                <td>{{$c->id}}</td>
                                <td><p>{{$c->name}}</p></td>
                                <td>
                                    @if($c->gender == 0)
                                    {{'Nữ'}}
                                    @else
                                    {{'Nam'}}
                                    @endif
                                </td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->address}}</td>
                                <td>{{$c->phone_number}}</td>
                                <td>{{$c->note}}</td>                             
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/customer/xoa/{{$c->id}}" " onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/customer/sua/{{$c->id}}">Sửa</a></td>
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

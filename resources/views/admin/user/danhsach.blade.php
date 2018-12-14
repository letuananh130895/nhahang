@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
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
                                <th>Quyền</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $u)
                            <tr class="odd gradeX" align="center">
                                <td>{{$u->id}}</td>
                                <td><p>{{$u->full_name}}</p></td>
                                <td>
                                    @if($u->quyen == 0)
                                    {{'User'}}
                                    @elseif($u->quyen == 2)
                                    {{'Admin tổng'}}
                                    @else
                                    {{'Admin'}}
                                    @endif
                                </td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->address}}</td>
                                <td>{{$u->phone}}</td>                             
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/user/xoa/{{$u->id}}"  onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/user/sua/{{$u->id}}">Sửa</a></td>
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

@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New
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
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($new as $n)
                            <tr class="odd gradeX" align="center">
                                <td>{{$n->id}}</td>
                                <td><p>{{$n->title}}</p>
                                    <div><img width="100px" src="upload/new/{{$n->image}}"></div>
                                </td>
                                <td>{!! $n->content !!}</td>
                              
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/new/xoa/{{$n->id}}"  onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/new/sua/{{$n->id}}">Sửa</a></td>
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

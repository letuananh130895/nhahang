@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                                <th>Link</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($slide as $s)
                            <tr class="odd gradeX" align="center">
                                <td>{{$s->id}}</td>
                                <td><p>{{$s->link}}</p>
                                    
                                    @if($s->link == "")
                                      <div><img width="100px" src="upload/slide/{{$s->image}}"></div>
                                    @else
                                      <div><img width="100px" src="{{$s->link}}"></div>
                                    @endif
                                </td>
                              
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/slide/xoa/{{$s->id}}"  onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/slide/sua/{{$s->id}}">Sửa</a></td>
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

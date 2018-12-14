@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm slide
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
                        <form action="admin/slide/them" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                           
                            
                            <div class="form-group">
                                <label>Link</label>
                                <input type="checkbox" id="useLink" name="useLink">
                                <input class="form-control" id="link" name="link" disabled="" placeholder="Nhập link hình ảnh" />
                            </div>
                             
                            <div class="form-group">
                                 <label>Hình ảnh</label>
                                 <input type="file" name="hinh" id="hinh" class="form-control">
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
           $('#useLink').change(function(){
               if($(this).is(":checked"))
               {
                   $('#link').removeAttr('disabled');
                   $('#hinh').attr('disabled','');
               }
               else
               {
                   $('#link').attr('disabled','');
                   $('#hinh').removeAttr('disabled');
               }
           });
       });
   </script>
@endsection


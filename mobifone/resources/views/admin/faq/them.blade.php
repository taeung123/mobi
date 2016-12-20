@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Các câu hỏi thường gặp(FAQ)
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                        <form action="admin/faq/them" method="POST" enctype="multipart/form-data" class="formfaq">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                        
                             <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="tieude" placeholder="Nhập Tiêu đề" />
                            </div>                           
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" id="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@section('script')
   <script type="text/javascript">
       $(document).ready(function(){
            $("#reset").click(function(){
                 $(".formfaq").refresh();   
            });
       });
   </script>
@endsection
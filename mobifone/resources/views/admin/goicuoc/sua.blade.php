@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Gói cước
                            <small>{{$goicuoc->Ten}}</small>
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
                        <form action="admin/goicuoc/sua/{{$goicuoc->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            
                            <div class="form-group">
                                <label>Loại khách hàng</label>
                               
                                <select class="form-control" name="khachhang" id="khachhang">
                                 @foreach($khachhang as $kh)
                                    <option @if($goicuoc->goidichvu->loaikh->id == $kh->id)
                                                {{"selected"}}
                                            @endif
                                     value="{{$kh->id}}">{{$kh->Ten}}</option>   
                                    @endforeach             
                                </select>
                                
                            </div>
                              <div class="form-group">
                                <label>Gói dịch vụ</label>                               
                                <select class="form-control" name="dichvu" id="dichvu" disabled="">
                                 @foreach($dichvu as $dv)
                                    <option   @if($goicuoc->goidichvu->id == $dv->id)
                                                   {{"selected"}}
                                              @endif                              
                                    value="{{$dv->id}}">{{$dv->Ten}}</option>   
                                    @endforeach             
                                </select>                               
                            </div>
                             <div class="form-group">
                                <label>Gói cước</label>
                                <input class="form-control" name="ten" placeholder="Nhập gói cước" value="{{$goicuoc->Ten}}" />
                            </div>

                           <div class="form-group">
                                <label>Giới thiệu</label>
                                <textarea class="form-control ckeditor" rows="3" name="tomtat">{{$goicuoc->TomTat}}</textarea>
                            </div>
                              <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control ckeditor" rows="5" name="noidung">{{$goicuoc->NoiDung}}</textarea>
                            </div>
                              <div class="form-group">
                                <label>Hình ảnh</label>
                                <p><img width="500px" src="upload/goicuoc/{{$goicuoc->Hinh}}"></p> 
                                <input type="file" name="hinh">
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
@endsection
@section('script')
<script type="text/javascript">
      $(document).ready(function(){
                 $('#dichvu').attr('disabled','');
            $("#khachhang").click(function(){
                 $("#dichvu").removeAttr('disabled');
                  var idloaikh = $(this).val();
                     //alert(idloaikh);
                         $.get("admin/ajax/dichvu/"+idloaikh,function(data){
                            //   alert(data);
                                    $("#dichvu").html(data);
                    });
           });
      });
</script>
@endsection
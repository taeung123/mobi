@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>{{$tintuc->TieuDe}}</small>
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
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            
                            <div class="form-group">
                                <label>Loại tin</label>
                               
                                <select class="form-control" name="loaitin">
                                 @foreach($loaitin as $lt)
                                    <option @if($tintuc->loaitin->id == $lt->id){{"selected"}} @endif value="{{$lt->id}}">{{$lt->Ten}}</option>   
                                    @endforeach             
                                </select>
                                
                            </div>
                               <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="tieude" placeholder="Nhập tiêu đề" value="{{$tintuc->TieuDe}}" />
                            </div>
                           <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea class="form-control ckeditor" rows="3" name="tomtat">{{$tintuc->TomTat}}</textarea>
                            </div>
                               <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control ckeditor" rows="5" name="noidung">{{$tintuc->NoiDung}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p><img width="500px" src="upload/tintuc/{{$tintuc->Hinh}}"></p>
                               <input type="file" name="hinh">
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input @if($tintuc->NoiBat == 1){{"checked"}} @endif 
                                    name="noibat" value="1" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input @if($tintuc->NoiBat == 0){{"checked"}} @endif  
                                    name="noibat" value="0" type="radio">Không
                                </label>
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

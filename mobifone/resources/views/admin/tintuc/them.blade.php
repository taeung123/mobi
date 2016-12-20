@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
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
                        <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            
                            <div class="form-group">
                                <label>Loại tin</label>
                               
                                <select class="form-control" name="loaitin">
                                 @foreach($loaitin as $lt)
                                    <option value="{{$lt->id}}">{{$lt->Ten}}</option>   
                                    @endforeach             
                                </select>
                                
                            </div>
                               <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="tieude" placeholder="Nhập tiêu đề" />
                            </div>
                           <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea class="form-control ckeditor" rows="3" name="tomtat"></textarea>
                            </div>
                               <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control ckeditor" rows="5" name="noidung"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                               <input type="file" name="hinhanh" />
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="noibat" value="1" checked="" type="radio">Có
                                </label>
                                <label class="radio-inline">
                                    <input name="noibat" value="0" type="radio">Không
                                </label>
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
@endsection

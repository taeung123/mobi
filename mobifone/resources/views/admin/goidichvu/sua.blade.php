@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Gói dịch vụ
                            <small>{{$dichvu->Ten}}</small>
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
                        <form action="admin/goidichvu/sua/{{$dichvu->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Loại khách hàng</label>
                               
                                <select class="form-control" name="khachhang">
                                 @foreach($khachhang as $kh)
                                    <option 
                                            @if($dichvu->LoaiUser = $kh->id)
                                               {{'selected'}}
                                            @endif
                                     value="{{$kh->id}}">{{$kh->Ten}}</option>   
                                    @endforeach             
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label>Gói dịch vụ</label>
                                <input class="form-control" name="ten" placeholder="Nhập gói dịch vụ" value="{{$dichvu->Ten}}" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả chi tiết gói dịch vụ</label>
                                <textarea class="form-control" rows="3" name="mota">{{$dichvu->MoTa}}</textarea>
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
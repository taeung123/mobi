@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>{{$user->name}}</small>
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
                        <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                        
                             <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="ten" placeholder="Nhập tên người dùng" value="{{$user->name}}" />
                            </div>
                              <div class="form-group">
                                <label>Email</label>
                              <input class="form-control" name="email" placeholder="Nhập email người dùng" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" type="password" name="pass" placeholder="Nhập mật khẩu người dùng" value="{{$user->password}}" />
                            </div>
                               <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control" 
                               type="password" name="repass" placeholder="Nhập lại mật khẩu người dùng" value="{{$user->password}}" />
                            </div>                    
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input @if($user->quyen ==0){{"checked"}}@endif name="quyen" value="0"  type="radio">Thường
                                </label>
                                <label class="radio-inline">
                                    <input @if($user->quyen ==1){{"checked"}}@endif name="quyen" value="1" type="radio">Admin
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

@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">FAQ-Detail
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
                        <form action="admin/faq-detail/sua/{{$detail->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Chủ đề FAQ</label>                              
                                <select class="form-control" name="faq" >
                                 @foreach($faq as $fa)
                                    <option @if($detail->faq->id == $fa->id)
                                                {{"selected"}}
                                             @endif 
                                    value="{{$fa->id}}">{{$fa->TieuDe}}</option>   
                                    @endforeach             
                                </select>
                                
                            </div>                       
                            <div class="form-group">
                                <label>Câu hỏi</label>
                                <textarea class="form-control ckeditor" rows="3" name="cauhoi">{{$detail->CauHoi}}</textarea>
                            </div>
                              <div class="form-group">
                                <label>Câu trả lời</label>
                                <textarea class="form-control ckeditor" rows="3" name="traloi">{{$detail->TraLoi}}</textarea>
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

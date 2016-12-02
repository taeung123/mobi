@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Gói cước
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên gói</th>
                                <th>Hình</th>
                                <th>Gói dịch vụ</th>                                
                                <th>giới thiệu</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($cuoc as $gc)
                            <tr class="odd gradeX" align="center">
                                <td>{{$gc->id}}</td>
                                <td>{{$gc->Ten}}</td>
                                <td> <img width="200px" src="upload/goicuoc/{{$gc->Hinh}}"></td>
                                <td>{{$gc->goidichvu->Ten}}</td>
                                <th align="center">{{$gc->TomTat}}</th>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/goicuoc/xoa/{{$gc->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/goicuoc/sua/{{$gc->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
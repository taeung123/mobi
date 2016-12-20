@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">FAQ-Detail
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
                                <th>Câu hỏi</th>                              
                                <th>FAQ</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($detail as $de)
                            <tr class="odd gradeX" align="center">
                                <td>{{$de->id}}</td>
                                <td>{{$de->CauHoi}}</td>
                                <td>{{$de->faq->TieuDe}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/faq-detail/xoa/{{$de->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/faq-detail/sua/{{$de->id}}">Sửa</a></td>
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
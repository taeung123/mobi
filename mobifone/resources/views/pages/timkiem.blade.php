  @extends('layout.index')
  @section('content')
     <section id="blog" class="container">
        <div class="center">
            <h2>Tìm kiếm</h2>
            <p style="color: red;font-size: 30px" class="lead "><i>{{$tukhoa}}</i></p>
        </div>
         <?php 
             function doimau($str,$tukhoa){
                      return str_replace($tukhoa, "<span style='color:red;font-style:italic;'>$tukhoa</span>", $str);
                        }
                     ?>
        <div class="blog">
            <div class="row">
                 <div class="col-md-8">
                 @foreach($goicuoc as $gc)
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="#"><img class="img-responsive img-blog" src="upload/goicuoc/{{$gc->Hinh}}" width="100%" alt="" /></a>
                                <h2>{!!doimau($gc->Ten,$tukhoa)!!}</h2>
                                <h3>{!!doimau($gc->TomTat,$tukhoa)!!}</h3>
                                <a class="btn btn-primary readmore" href="chitietgoicuoc/{{$gc->id}}">Chi Tiết <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->  
                 @endforeach  
                 {{$goicuoc->links()}} 
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
    @endsection('content')
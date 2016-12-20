  @extends('layoutdn.index')
  @section('content')
     <section id="blog" class="container">
        <div class="center">
            <h2>{{$goidv->Ten}}</h2>
            <p class="lead">{{$goidv->MoTa}}</p>
        </div>
        <div class="blog">
            <div class="row">
                 <div class="col-md-8">
                 @foreach($goicuoc as $gc)
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="#"><img class="img-responsive img-blog" src="upload/goicuoc/{{$gc->Hinh}}" width="100%" alt="" /></a>
                                <h2>{{$gc->Ten}}</h2>
                                <h3>{!!$gc->TomTat!!}</h3>
                                <a class="btn btn-primary readmore" href="chitietgoicuocdn/{{$gc->id}}">Chi Tiết <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->  
                 @endforeach  
                 {{$goicuoc->links()}} 
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
    @endsection('content')
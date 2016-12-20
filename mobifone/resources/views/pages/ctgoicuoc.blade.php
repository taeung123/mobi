  @extends('layout.index')
  @section('content')
  <section id="blog" class="container">
        <div class="center">
            <h2>{{$goicuoc->Ten}}</h2>
        </div>
        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                    @if($goicuoc->Hinh)
                        <img class="img-responsive img-blog" src="upload/goicuoc/{{$goicuoc->Hinh}}" width="100%" alt="" />
                        @endif
                            <div class="row"> 
                               @if($goicuoc->created_at) 
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date">{{$goicuoc->created_at}}</span>
                                    </div>
                                </div>
                                @endif
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <h2>{{$goicuoc->TomTat}}</h2>
                                   <h3>{!!$goicuoc->NoiDung!!}</h3>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->
  @endsection
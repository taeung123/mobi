  @extends('layout.index')
  @section('content')
  <section id="blog" class="container">
        <div class="center">
            <h2>{{$tintuc1->TieuDe}}</h2>
        </div>
        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">@if($tintuc1->Hinh)
                        <img class="img-responsive img-blog" src="upload/tintuc/{{$tintuc1->Hinh}}" width="100%" alt="" />
                         @endif
                            <div class="row"> 
                               @if($tintuc1->created_at) 
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date">{{$tintuc1->created_at}}</span>
                                    </div>
                                </div>
                                @endif
                                <div class="col-xs-12 col-sm-10 blog-content">
                                    <h2>{{$tintuc1->TomTat}}</h2>
                                   <h3>{!!$tintuc1->NoiDung!!}</h3>

                                </div>
                            </div>
                        </div><!--/.blog-item-->
            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->
  @endsection
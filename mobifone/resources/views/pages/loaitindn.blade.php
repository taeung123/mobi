  @extends('layoutdn.index')
  @section('content')
     <section id="blog" class="container">
        <div class="center">
            <h2>{{$loaitin1->Ten}}</h2>
        </div>
        <div class="blog">
            <div class="row">

                 <div class="col-md-8">
                 @foreach($loaitin2 as $lt)
                    <div class="blog-item">
                        <div class="row">                            
                              @if($lt->created_at) 
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date">{{$lt->created_at}}</span>
                                    </div>
                                </div>
                              @endif
                            <div class="col-xs-12 col-sm-10 blog-content">
                                   @if($lt->Hinh)
                                <a ><img class="img-responsive img-blog" src="upload/tintuc/{{$lt->Hinh}}" width="100%" alt="" /></a>
                                  @endif
                                <h2>{{$lt->TieuDe}}</h2>
                                <h3>{!!$lt->TomTat!!}</h3>
                                <a class="btn btn-primary readmore" href="tintucdn/{{$lt->id}}">Chi Tiết <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->  
                 @endforeach  
                    <div class="widget categories">
                      <h3>Tin nổi bật</h3>
                      <div class="row">
                        <div class="col-sm-12">
                        @foreach($loaitin as $tt)
                        <?php $data = $tt->tintuc->where('NoiBat',1)->sortByDesc('create_at')->take(4); ?>
                        @foreach($data->all() as $nb)
                           <div class="single_comments">
                    @if($nb['Hinh'])<img src="upload/tintuc/{{$nb['Hinh']}}" width="50px" alt=""  />@endif
                    <a href="tintucdn/{{$nb['id']}}"><p>{{$nb['TieuDe']}} </p></a>
                                    <div class="entry-meta small muted">
                                        <span>{{$nb['TomTat']}} </span>
                                    </div>
                                    @endforeach
                            @endforeach        
                           </div>
                         </div>
                        </div>                     
                    </div><!--/.recent comments-->     
                 {{$loaitin2->links()}} 
              </div>

            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
    @endsection('content')

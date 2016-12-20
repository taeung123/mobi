  <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">     
            <?php $i=0; ?>                  
               @foreach($slidedn as $gc)              
                 <li data-target="#main-slider" data-slide-to="{{$i}}"  
                  @if($i == 0)
                   class="active"
                  @endif>
                    
                </li>    
                <?php $i++; ?> 
                @endforeach              
            </ol>
            <div class="carousel-inner">
            <?php $i=0; ?>
               @foreach($slidedn as $gc)               
                <div @if($i == 0) 
                  class="item active" @else class="item" 
                  @endif 
                  style="background-image: url(upload/goicuoc/{{$gc->Hinh}})">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">{{$gc->TieuDe}}</h1>
                                    <h2 class="animation animated-item-2">{{$gc->TomTat}}</h2>
                                    <a class="btn-slide animation animated-item-3" href="chitietgoicuocdn/{{$gc->id}}">Chi tiết</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->
                <?php $i++; ?>
                @endforeach

            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->
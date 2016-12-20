@extends('layoutdn.index')
@section('content') 
 @include('layoutdn.slide')
  @foreach($goidichvu as $goidv)
    @if($goidv->loaikh->id == 2)
       <section id="goidichvu{{$goidv->id}}">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>{{$goidv->Ten}}</h2>
                <p class="lead">{{$goidv->MoTa}}</p>
            </div>
           <?php $goicuoc = $goidv->goicuoc->where('idGoiDichVu',$goidv->id)->take(4); ?>
            <div class="row">
                @foreach($goicuoc->all() as $gc)
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="upload/goicuoc/{{$gc['Hinh']}}" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="chitietgoicuocdn/{{$gc->id}}">{{$gc['Ten']}}</a> </h3>
                                <p>{{$gc['TomTat']}}</p>
                                <a class="preview" href="images/portfolio/full/item1.png" rel="prettyPhoto"><i class="fa fa-eye"></i> Chi tiết</a>
                            </div> 
                        </div>
                    </div>
                </div>  
                @endforeach 
            </div><!--/.row-->
        </div><!--/.container-->
       </section><!--/#recent-works-->
    @endif
  @endforeach   
   @foreach($loaitin as $lt)  
  <section id="tintuc{{$lt->id}}" >
        <div class="container">
        
           <div class="center wow fadeInDown">
                <h2>{{$lt->Ten}}</h2>                
            </div>
          <?php                
                $tintuc = $lt->tintuc->where('idLoaiTin',$lt->id)->take(3);
            ?>
            <div class="row">
            @foreach($tintuc as $tt)
                <div class="tinkhuyenmai">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <a href="tintucdn/{{$tt->id}}"><i class="fa fa-bullhorn"></a></i>
                            <h2>{{$tt['TieuDe']}}</h2>
                            <h3>{{$tt['TomTat']}}</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
             @endforeach   
            </div><!--/.row-->    
          
        </div><!--/.container-->
    </section><!--/#feature-->
   @endforeach
   
@endsection
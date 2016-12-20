<div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">    
                               @foreach($goidichvu as $dv) 
                             @if($dv->loaikh->id == 1)                                           
                             <li><a href="goicuoc/{{$dv->id}}">{{$dv->Ten}}</a></li>
                             @endif
                             @endforeach                                                   
                           <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Tin tức <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">

                                @foreach($loaitin as $lt)
                                <li><a href="loaitin/{{$lt->id}}">{{$lt->Ten}}</a></li>
                                @endforeach
                            </ul>
                        </li> 
                        <li><a href="faq">Chăm sóc khách hàng</a></li>
                        <li><a href="gioithieu">Giới thiệu</a></li>                   
                    </ul>
                </div>
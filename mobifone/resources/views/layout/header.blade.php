<header id="header">
        <nav class="navbar navbar-inverse" role="banner">        
            <div class="container">
				  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="trangchu">Mobifone</a>
                </div>      
                <div class="collapse navbar-collapse navbar-right">
                <div class="top-number"><p><i class="fa fa-phone-square"></i> Hotline: 18001090</p></div>
                    <ul class="nav navbar-nav">
                    @foreach($loaikh as $kh)
                         <li @if($kh->id == 1)
                               class="active"  
                             @endif ><a href="trangchu/{{$kh->id}}">{{$kh->Ten}}</a></li>
                    @endforeach                
                    </ul>
                        <div class="search">
                                <form action="timkiem" method="get" role="form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="text" name="tukhoa" class="search-form" autocomplete="off" placeholder="Tìm kiếm">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                </div>
                </div><!--/.container-->
                @include('layout.menu')
            
        </nav><!--/nav-->
		
    </header><!--/header-->
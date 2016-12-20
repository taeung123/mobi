  @extends('layout.index')
  @section('content')
  <section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>FAQ</h2>
               <p class="lead">Giải đáp các câu hỏi thường gặp</p>
            </div>


            @foreach($faq as $fa)
            <p style="color: red ;font-size: 40px" >{{$fa->TieuDe}}</p>
            <?php $ctfaq = $fa->faqdetail->where('idFAQ',$fa->id); ?>
            <?php $i=1; ?>
             @foreach($ctfaq->all() as $ct)           
                <p><h3>Câu hỏi {{$i}}: {{$ct['CauHoi']}}</h3></p>
                 <p><h4>Trả lời: {{$ct['TraLoi']}}</h4></p>
                 <?php $i++; ?>
                 @endforeach
            @endforeach

          
        </div>
    </section><!--/#portfolio-item--> 
  @endsection
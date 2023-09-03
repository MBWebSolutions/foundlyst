<x-layout>
  <div class="show-card container mb-5">
    <div class="container-fluid d-flex justify-content-center  ">
      <div class="row ">
        <div class="col-12 p-3 my-4">
          <h2 class="display-2 title text-break"> {{$announcement->title}}</h2>
        </div>
      </div>
    </div>
    <div class="container ">
      <div class="row d-flex justify-content-around">
        <div class="col-12 col-md-4">
          @if(count($announcement->images) > 0)
          <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="true">
            <div class="carousel-inner pb-5">
              @foreach($announcement->images as $image)
              <div class="carousel-item @if($loop->first)active @endif"> 
                
                <img src="{{$image->getUrl(500, 500)}}" class="w-100 rounded"  alt=""> 
                
              </div>
              @if(count($announcement->images) > 1)
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
              @else
              @endif
              @endforeach
            </div>
          </div>
          @else
          <div class="col-12 col-md-6 mb-5  ">
            <img class="img-d " src="/img/default.png" alt="">
          </div>
          @endif
        </div>        
       
      <div class="col-12 col-md-4 text-center">
        <p class="body1 ">{{__('ui.descrizione')}}:</p>  
        <p class="body text-break">{{$announcement->body}}</p>
        <p class="priceshow text-break">{{__('ui.prezzo')}}: &euro; {{$announcement->price}}</p>
        <a href="{{route('categoryShow', ['category'=>$announcement->category])}}" style="text-decoration:none ;" class=" my-2 ">{{__('ui.categoria')}}: {{$announcement->category->name}}</a>
        <hr>
        <p class="autore text-break ">{{__('ui.pubblicato')}}: {{$announcement->created_at->format('d/m/y')}} - {{__('ui.autore')}}: {{$announcement->user->name ?? ''}}</p>
      </div>
    </div> 
    </div>
  </div>
</div>
</x-layout>


<x-layout>
  <div class="container-fluid d-flex justify-content-center ">
    <div class="row">
      <div class="col-12 p-3 my-2">
        <h2 class="display-2 title text-break">
          {{$announcement_to_check ? 'Ecco gli annunci da revisionare': 'Non ci sono annunci da revisionare'}}
        </h2>
      </div>
    </div>
  </div>
  @if($announcement_to_check)
  <div class="container">
    <div class="row">
      @if(count($announcement_to_check->images) > 0)
      <div class="col-12">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach($announcement_to_check->images as $image)
            <div class="carousel-item @if($loop->first)active @endif">
              <div class="row">
                <div class="col-12 col-md-6">
                  <img src="{{$image->getUrl(500, 500)}}" class="img-fluid p-3 rounded"  alt="">
                </div>
                <div class="col-12 col-md-3 border-end">
                  <h5 class="tc-accent mt-3">Tags</h5>
                  <div class="p-2">
                    @if ($image->labels)
                    @foreach ($image->labels as $label) 
                    <p class="d-inline">{{$label}},</p>
                    @endforeach
                    @endif                    
                  </div>
                </div>
                <div class=" col-12 col-md-3">
                  <div class="card-body">
                    <h5 class="tc-accent">Revisione Immagini</h5>
                    <p>Adulti: <span class="{{$image->adult}}"></span></p>
                    <p>Satira: <span class="{{$image->spoof}}"></span></p>
                    <p>Medicina: <span class="{{$image->medical}}"></span></p>
                    <p>Violenza: <span class="{{$image->violence}}"></span></p>
                    <p>Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>
                  </div>
                </div> 
              </div>
            </div>
            @if(count($announcement_to_check->images) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Precedente</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Successivo</span>
            </button>
            @else
            @endif
            @endforeach
          </div>
        </div>
        
        
        
        
      </div>
      @else
        <div class="col-12 text-center">
          <img src="/img/default.png" class="img-fluid p-3 rounded" alt="...">

        </div>
      @endif
      <div class="col-12">
        <div class="d-flex justify-content-center">
          <div>
            <h5 class="card-title text-break ">Titolo: {{$announcement_to_check->title}}</h5>
            <p class="card-text text-break">Descrizione {{$announcement_to_check->body}}</p>
            <p class="card-footer">Pubblicato il: {{$announcement_to_check->created_at->format('d/m/Y')}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class=" p-5 col-6 ">
      <form action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn revisor-btn shadow">Accetta</button>
        </div>
      </form>
    </div>
    <div class="col-6 p-5 ">
      <form action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check])}}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn revisor-btn shadow">Rifiuta</button>
      </form>    
    </div>
  </div>
  @endif  
</div>
</x-layout>
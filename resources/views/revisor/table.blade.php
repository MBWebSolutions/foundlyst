<x-layout>
  <div class="container-fluid titolo-tabella mb-4">
    <div class="row">
      <div class="col-12 ">
        <h1 class="">
          {{$announcements_to_checks ? 'Ecco gli annunci da revisionare': 'non ci sono annunci da revisionare'}}
        </h1>
      </div>
    </div>
  </div>




  {{-- table --}}

  <div class="d-flex justify-content-center d-none d-md-block ">
    <table class="table tabela  mt-3 ">
        <thead >
          <tr >
            <th scope="col">Id</th>
            <th scope="col">{{__('ui.titolo')}}</th>
            <th scope="col">{{__('ui.prezzo')}}</th>
            <th scope="col">{{__('ui.ultimaModifica')}}</th>
            <th scope="col">{{__('ui.accetta')}}</th>
            <th scope="col">{{__('ui.rifiuta')}}</th>
            <th scope="col">{{__('ui.dettagli')}}</th>
    
      
    
          </tr>
        </thead>
        <tbody >
          <tr >
    
          @foreach($announcements_to_checks as $element)
    
          
            <td scope="row">{{$element->id}}</th>
            <td>{{$element->title}}</td>
            <td>{{$element->price}}</td>
            <td>{{$element->updated_at->format('d/m/Y')}}</td>
    
            {{-- acceta --}}
            <td>
              <form action="{{ route('revisorAccept.tabela', ['announcement' => $element])}}" method="POST">
                @csrf
                @method('PATCH')
    
                <button type="submit" class="btn btn-success  ">{{__('ui.accetta')}}</button>
              </form>
            </td>
            <td>
              <form action="{{ route('revisorReject.tabela', ['announcement' => $element])}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger ">{{__('ui.rifiuta')}}</button>
              </form>
            </td>
    
            <td>
              <a href="{{ route('revisor.index')}}" class="btn btn-warning">{{__('ui.dettagli')}}</a>
            </td>
    
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

{{-- modale --}}
<div class="container  d-block d-sm-block d-md-none">
  <div class="row d-flex justify-content-center">
    <div class="col-6" >
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        visualizza tabella dei annunci
      </button>
    </div>
  </div>
</div>


<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content modal-color modal-text ">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">Tabella revisioni</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table tabela">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">{{__('ui.titolo')}}</th>
              <th scope="col">{{__('ui.prezzo')}}</th>
              <th scope="col">{{__('ui.ultimaModifica')}}</th>
              <th scope="col">{{__('ui.accetta')}}</th>
              <th scope="col">{{__('ui.rifiuta')}}</th>
              <th scope="col">{{__('ui.dettagli')}}</th>
      
        
            </tr>
          </thead>
          <tbody>
              @foreach($announcements_to_checks as $element)
           
            <tr>
              <th scope="row">{{$element->id}}</th>
              <td>{{$element->title}}</td>
              <td>{{$element->price}}</td>
              <td>{{$element->updated_at->format('d/m/Y')}}</td>
      
      {{-- acceta --}}
      <td><form action="{{ route('revisorAccept.tabela', ['announcement' => $element])}}" method="POST">
          @csrf
          @method('PATCH')
      
          <button type="submit" class="btn btn-success  ">{{__('ui.accetta')}}</button>
          </form></td>
      <td>
          <form action="{{ route('revisorReject.tabela', ['announcement' => $element])}}" method="POST">
              @csrf
              @method('PATCH')
              <button type="submit" class="btn btn-danger ">{{__('ui.rifiuta')}}</button>
              </form>
      </td>
      
      <td>
      <a href="{{route('announcements.show',$element)}}"class="btn btn-warning">{{__('ui.dettagli')}}</a>
      </td>
      
            </tr>
             @endforeach
          </tbody>
        </table>
      </div>
     
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
      </div>
     
    </div>
  </div>
</div>



</x-layout>

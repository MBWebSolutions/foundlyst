<x-layout>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h2>Esplora la Categoria {{$category->name}}</h2>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row  d-flex justify-content-center ">
      @forelse($announcements as $announcement)
      <x-card :announcement="$announcement" />
      @empty
      <div class="col-6 col-md-3 text-center">
        <p class="h1">Non sono presenti annunci per questa categoria!</p>
        <p class="h2">Pubblicane uno: <a href="{{route('announcements.create')}}" class="btn n-annunci shadow">Nuovo annuncio</a></p>
      </div>
      @endforelse
    </div>
  </div>


</x-layout>
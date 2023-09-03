
<x-layout >
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>{{__('ui.allAnnouncements')}}</h2>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
     @forelse ($announcements as $announcement)
     
      <x-card :announcement="$announcement"></x-card>
      
     @empty
        <div class="col-12">
          <div class="alert alert-warning py-3 shadow">
            <p class="lead">{{__('ui.noAnnouncements')}}</p>
          </div>
        </div>
     @endforelse
      {{$announcements->links()}}
    </div>
  </div>
</x-layout >

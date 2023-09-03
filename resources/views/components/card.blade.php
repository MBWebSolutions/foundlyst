<div class="col-6 col-md-3  rotondo rounded jborder-card d-flex justify-content-center" data-aos="fade-up">
  <div class=" bg-card px-0 my-2" style="width: 18rem;">
    <a href="{{route('announcements.show', compact('announcement'))}}" class="decoration-none">
      <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300, 300) : 'img/default.png'}}" class="img-fluid rotondo-img" alt="...">
      <div class="py-3 px-2 ">
        <h5 class=" text-break w-auto text-card">{{$announcement->title}}</h5>
        <hr>
        <div class="d-flex justify-content-end">
           <div class="btn btn-secondarys price d-wrap">{{$announcement->price}}&euro;</div> 
        </div>
      </div>
    </a>
  </div>
</div>




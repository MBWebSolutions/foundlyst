<footer>
  <div class="container-fluid  mt-0 p-5 footer    ">
    <div class="row ">
      <div class="cristo col-12 pt-3 infoBootstrap  col-md-4 brackpoint_color text-wrap ">
        <h3 class="pb-3 infoBootstrap">{{__('ui.categorie')}}</h3>
        @foreach($categories as $category)
        <p><a class="infoBootstrap" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a></p>
        @endforeach
      </div>
      <div class=" col-12 pt-3  col-md-4   infoBootstrap text-start">
        <h3 class="pb-3">Info</h3>
        <p class="">Presto.it</p>
      </div>
      <div class="  col-12 pt-3  col-md-4 infoBootstrap text-start ">
        <h3 class="">{{__('ui.seguici')}}</h3>
        <div>
          <a class="infoBootstrap" href="https://it-it.facebook.com/"><i class="bi bi-facebook text-dark"></i> Facebook </a>
        </div>
        <div>
          <a class="infoBootstrap" href="https://twitter.com/?lang=it"><i class="bi bi-twitter text-dark"></i>Twitter </a>
        </div>
        <div>
          <a class="infoBootstrap" href="https://www.youtube.com/"> <i class="bi bi-youtube text-dark"></i>Youtube</a>
        </div>
        <div>
          <a class="infoBootstrap" href="https://instagram.com/"> <i class="bi bi-instagram text-dark"> </i>Instagram</a>
        </div>
      </div>
    </div>
  </div>
  <div class="position-relative">
    <div class="position-absolute bottom-0 end-0 m-5">
      <a href="#up" ><button class="m-5  register-btn"><i class="bi bi-arrow-bar-up"></i></button></a>
    </div>
  </div>
</footer>

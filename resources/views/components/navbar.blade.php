<nav class="navbar d-none d-md-block navbar-expand-lg color" id="up">
  <div class="container-fluid">
    <a class="navbar-brand logo-small" href="{{route('welcome')}}"><img class="img-nav" src="/img/presto.png" alt=""></a>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <div class="vr text-dark"></div> --}}
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown text-center">
          <a class=" category-color nav-link dropdown-toggle fs-4" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.categorie')}}</a>
          <ul class="dropdown-menu category-nav row" aria-labelledby="categoriesDropdown">
            @foreach($categories as $category)
            <li>
              <div>
                <a class="dropdown-item " href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a>
              </div>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @endforeach
          </ul>
        </li>
      </ul>
      <ul class="container d-flex d-none d-lg-block">
        <div class="col-12">
          <li class="nav-item">
            <form action="{{ route('announcements.search')}}" method="GET" class="d-flex " role="search">
              <input name="searched" class="form-control searchbar" type="search" placeholder="Search" aria-label="Search">
              <button class="searchbar-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </li>
        </div>
      </ul>

    {{-- <div class="d-flex align-items-center">
        <button id="btnDarkmode" class="btn "><i class="bi bi-moon-stars-fill fs-1"></i></button>
    </div>
    --}}
     

      {{-- Registration & Log In --}}
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @guest
        <li class="nav-item">
          <a class="nav-link " href="{{route('register')}}"><button class="register-btn p-2">{{__('ui.registrati')}}</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link login-btn" href="{{route('login')}}"><i class="fa-regular fa-circle-user"></i></a>
        </li>
        @else
        <div class="container-fluid">
          <div class="row">
            <li class="nav-item">
              <a class="nav-link active  lh-1" aria-current="page" href="{{route('announcements.create')}}">
                <div class="text-center"><i class="fa-regular fa-square-plus icon-color fs-1"></i></div>
                {{-- <div class="text-center">Nuovo annuncio</div> --}}
              </a>
            </li>
          </div>
        </div>
       
       {{-- AGGIUNGERE NAVBAR DAL FOOTER --}}

        <div class="container-fluid btn-group dropstart">
         

            <a class="nav-link btn-group dropstart d-flex justify-content-center lh-1" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="text-center icon-nav"> @auth
                @if (Auth::user()->is_revisor)
                <i class="fa-sharp fa-solid fa-shield position-relative"><span class="position-absolute top-50 start-50 translate-middle icon_before badge rounded-pill bg-danger">
                  {{App\Models\Announcement::toBeRevisionedCount()}}
                  <span class="visually-hidden">{{__('ui.unreadMessages')}}</span>
                  </span></i>
                @else
                <i class="bi bi-person-check-fill"></i>
                @endif
                @endauth
                @guest
                <i class="fa-solid fa-user"></i>
                @endguest
                    
              
                 {{-- notifica --}}
                 @auth

                 @if (Auth::user()->is_revisor)

                 
                
                   @endif
                   @endauth
              </div>
              {{-- <div class="text-center">Ciao,<br>{{Auth::user()->name}}</div> --}}
            </a>
              <ul class="dropdown-menu color2">
                
                <li> @auth
                  <p class="dropdown-item">{{__('ui.hello')}}, {{Auth::user()->name}}</p>
                  @endauth </li>
                <li><hr class="dropdown-divider"></li>
                @if (Auth::user()->is_revisor)
                <li><a class="dropdown-item" href="{{route('announcements.table')}}">{{__('ui.tabella')}}</a></li>
                <li><a class="dropdown-item" href="{{ route('revisor.index')}}">{{__('ui.singolo')}}</a></li>
                <li><hr class="dropdown-divider"></li>
                @endif
                <li><a class="btn btn-outline-danger dropdown-item " href="/logout" onclick="event.preventDefault();getElementById('form-logout').submit();">{{__('ui.esci')}}</a></li>
                
                <form id="form-logout" action="{{route('logout')}}" method="post" class="d-none">
                  @csrf
                </form>
              </ul>
             
        </div>
        
        @endguest
        <div class="btn-group dropstart nav-link rounded impo lh-1">
          <button class=" btn " type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-gear fs-3"></i>
          </button>
          <ul class="dropdown-menu color2">
            <li class="d-flex nav-item"><button id="btnDarkMode" class="btn "><i class="bi bi-moon-stars-fill fs-1"></i></button>
            <p class="pt-3">{{__('ui.modalita')}}</p></li>
              <li><hr></li>
              
              <li class="nav-item d-flex">
                <x-_locale lang='it' nation='it'/>
                <p class="m-auto">Italiano</p>
              </li>
            <li class="nav-item d-flex">
              <x-_locale lang='en' nation='gb'/>
              <p class="m-auto">English</p>
            </li>
            <li class="nav-item d-flex">
              <x-_locale lang='es' nation='es'/>
              <p class="m-auto">Español</p>
            </li>
          </ul>
        </div>
      </ul>
     
    </div>
  </div>
</nav>
{{-- Searchbar for smaller devices --}}
<div class="container-fluid d-flex color d-block d-lg-none pb-2 pt-2" id="up">
  <div class="col-12 text-center">
    <a class="navbar-brand logo-small d-block d-md-none" href="{{route('welcome')}}">Presto</a>
    <form action="{{ route('announcements.search')}}" method="GET" class="pt-2 d-flex " role="search">
      <input name="searched" class="form-control searchbar" type="search" placeholder="Search" aria-label="Search">
      <button class="btn searchbar-btn" type="submit"><i class="fa-solid fa-magnifying-glass d-flex justify-content-center"></i></button>
    </form>
  </div>
</div>


{{-- modal --}}
<div class="modal fade " id="category" tabindex="-1" aria-labelledby="category" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-color modal-text">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('ui.categorie')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            @foreach($categories as $category)
            <div class="col-4">
              <p fs-1> <a class="linkFooter" href="{{route('categoryShow', compact('category'))}}">{{$category->name}}</a></p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade   " id="user" tabindex="-1" aria-labelledby="user" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-color modal-text">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('ui.account')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            @guest
            <div class="col-6 d-flex justify-content-between">
              <a class="nav-link " href="{{route('register')}}"><button class="register-btn-modal  p-2">{{__('ui.registrati')}}</button></a>
            </div>
            <div class="col-6">
              <a class="" href="{{route('login')}}"><button class="register-btn-modal  p-2">{{__('ui.login')}}</button></a>
            </div>
            @endguest
            @auth
            <div class="col-6">
              <a class="dropdown-item " href="/logout" onclick="event.preventDefault();getElementById('form-logout').submit();"><button class="register-btn-modal  p-2">{{__('ui.esci')}}</button></a>
            </div>
            <div class="col-6 ">
              @if (Auth::user()->is_revisor)
              <a class=" " href="{{ route('revisor.index')}}"> <button class="register-btn-modal  position-relative p-2">{{__('ui.revisioni')}} <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{App\Models\Announcement::toBeRevisionedCount()}}
                    <span class="visually-hidden">{{__('ui.unreadMessages')}}</span>
                  </span>
                </button>
              </a>
              <div class="col-6">
                <a class="dropdown-item" href="{{route('announcements.table')}}"><button class="register-btn-modal  position-relative p-2">{{__('ui.tabella')}}</button></a>  
              </div>
              @endif
            </div>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade d-md-none" id="settings" tabindex="-1" aria-labelledby="settings" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-color modal-text">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('ui.settings')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row d-flex align-content-around fs-1">
            <div class="col-4">
              <p>{{__('ui.modalita')}}:</p>
            </div>
             <div class="col-2 d-flex "> 
              <button id="btnDarkMode2" class="btn fs-1 "><i class="bi bi-moon-stars-fill fs-1"></i> </button>
            </div>
          </div>
          <div class="row d-flex align-content-around fs-1">
            
            <div class="col-5 ">
              <p class="">{{__('ui.lingua')}}:</p>
            </div>
            <div class="col-2">
              <x-_locale lang='it' nation='it' />
            </div>
            <div class="col-2">
              <x-_locale lang='en' nation='gb' />
            </div>
            <div class="col-2">
              <x-_locale lang='es' nation='es' />
            </div>
          </div>
    
        </div> 
      </div>
    </div>
  </div>
</div>


{{-- smartNav --}}
{{-- Old --}}
<div class="nav-rules d-block d-sm-block d-md-none">
  {{-- Prova --}}
  {{-- <div class="nav-rules d-block d-lg-none"> --}}
  <nav class="  ditails-nav">
    <div class="navigation">
      <ul class="d-flex ">
        <li class="list {{Route::is('welcome')?'active':''}}">
          <a class="icon" href="{{route('welcome')}}">
            <span>
              <i class="fa-solid fa-house"></i>
            </span>
            <span class="text">
              {{-- HOME --}}
            </span>
          </a>
        </li>
        <li class="list {{Route::is(('categoryShow'))||Route::is('announcements.show')||Route::is('announcements.index') ? 'active':''}}">
          <a class="icon" href="#" data-bs-toggle="modal" data-bs-target="#category">
            <span>
              <i class="bi bi-search"></i>
            </span>
            <span class="text">
              {{__('ui.categoria')}}
            </span>
          </a>
        </li>
        <li class="list {{Route::is('announcements.create')||Route::is('login') ? 'active':''}} ">
          <a class="icon" href="{{route('announcements.create')}}">
            <span>
              <i class="bi bi-plus-square-fill"></i>
            </span>
            <span class="text">
              {{__('ui.vendi')}}
            </span>
          </a>
        </li>
        <li class="list">
          <a class="icon" href="#" data-bs-toggle="modal" data-bs-target="#settings">
            <span>
              <i class="bi bi-gear-wide-connected"></i>
            </span>
            <span class="text">
              {{__('ui.settings')}}
            </span>
          </a>
        </li>
        
        <li class="list {{Route::is('announcements.table')||Route::is('revisorAccept.tabela')||Route::is('revisor.index')||Route::is('register') ? 'active':''}}">
          <a class="icon" href="# " data-bs-toggle="modal" data-bs-target="#user">
            <span>
              @auth
              @if (Auth::user()->is_revisor)
              <i class="fa-sharp fa-solid fa-shield position-relative"><span class="position-absolute top-0 start-50 translate-middle-x badge rounded-pill bg-danger navbar-icon">
                  {{App\Models\Announcement::toBeRevisionedCount()}}
                  <span class="visually-hidden">{{__('ui.unreadMessages')}}</span>
                </span></i>
              @else
              <i class="bi bi-person-check-fill"></i>
              @endif
              @endauth
              @guest
              <i class="fa-solid fa-user"></i>
              @endguest

            </span>
            <span class="text">
              {{__('ui.account')}}
            </span>
          </a>
        </li>
        <div class="indicator"></div>

      </ul>
    </div>
  </nav>
  <!-- Modal -->

</div>
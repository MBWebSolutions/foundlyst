<x-layout>
    {{-- Da desktop --}}
    <div class="container-fluid img header-home d-none d-md-block ">
        <div class="row ">
            <div class="col-6 post ">
                @guest
                <div class="post-w p-0 ">
                    <h2 class="text-post text-break">{{__('ui.notOurUser')}}</h2>
                </div>
                <div class="">
                    <a href="{{route('register')}}"><button class="button-post pulse">{{__('ui.registrati')}}</button></a>
                </div>

                @endguest
                @auth
                <div class="post-w p-0">
                    <h2 class="text-post text-center text-break">{{__('ui.buongiorno')}}, {{Auth::user()->name}} {{__('ui.continue')}}</h2>
                </div>
                <div class="">
                    <a href="{{route('announcements.index')}}"><button class="button-post"> {{__('ui.nuoviAnnunci')}} </button></a>
                </div>
                @endauth
            </div>
        </div>
    </div>

    {{-- Mastehad solo per immagine. Il contenuto scritto nel prossimo grid system --}}
    <div class="container-fluid d-block d-md-none px-0 masthead">
        <div class="row ">
        </div>
    </div>
    <div class="container-fluid d-block d-md-none">
        <div class="row">
            <div class="col-12">
                @guest
                <h2 class="text-post text-center">{{__('ui.notOurUser')}}</h2>
                <a href="{{route('register')}}"><button class="button-post">{{__('ui.registrati')}}</button></a>
                @endguest
                @auth
                <h2 class="text-post text-center">{{__('ui.buongiorno')}}, {{Auth::user()->name}} {{__('ui.continue')}}</h2>
                <a href="{{route('announcements.index')}}"><button class="button-post">{{__('ui.nuoviAnnunci')}}</button></a>
                @endauth
            </div>
        </div>
    </div>

        <h1 class="hero-title text-center my-5">{{__('ui.allAnnouncements')}}</h1>
        <div class="container-fluid ">
            <div class="row ">
                @foreach($announcements as $announcement)
                <x-card :announcement="$announcement" />
                @endforeach
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
            </div>
        </div>



   <div class="container-fluid ">
        <div class="row">
            <div class="col-12 text-center my-5 about-us" data-aos="fade-down">
                <h2>{{__('ui.aboutUs')}}</h2>
            </div>
            <div class="col-12 col-md-6 carousel-w px-0 px-md-2 " data-aos="fade-up">
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="/img/img1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="/img/img2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="/img/img3.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
                </div>
            <div class="col-12 col-md-6 text-center paragrafo" data-aos="fade-up">
                <p>Presto è un sito di compravendita online, in cui si può acquistare qualsiasi cosa, da un libro ad un immobile. Presto fa particolare attenzione alla mobile experience, poiché lo sviluppo è stato studiato per rendere intuitivo l’utilizzo per qualsiasi fascia d’età e poiché è disponibile in multilingua tra cui l’italiano, l’inglese e lo spagnolo. Un’intelligenza artificiale ci ha permesso di implementare una funzione che permette di preservare la privacy dei nostri utenti a cui diamo una particolare importanza.
                Presto è un progetto in continua crescita, per cui è stata implementata una sezione in cui i nostri utenti possono offrirsi di collaborare con noi.</p>
            </div>
        </div>
    </div>


    <!-- team -->
    <section class="container-fluid ps-5 team-container">
      <h2 class="pt-5 mb-5 text-center team">{{__('ui.ourTeam')}}</h2>
      <div class="container-fluid text-center">
        <div class="row justify-content-around me-3">
          <div class="col-12 col-md-2 team-box pt-2 " data-aos="zoom-in-up">
           <a href="https://www.linkedin.com/in/valeriy-plisov-2091a8171/" target="blank"> <img class="img-round mb-3" src="/img/valery.jpg" alt=""></a>
            <a class="link" href="https://www.linkedin.com/in/valeriy-plisov-2091a8171/" target="blank"><h6 class="nome">Valeriy Pilsov</h6></a>
            <p>Mi chiamo Valery Plisov, mi piace organizzare il lavoro, ottimizzare il sito per varie piattaforme e progettare il design UI e Ux</p>
            
          </div>
          <div class="col-12 col-md-2 team-box pt-2" data-aos="zoom-in-up">
          <a href="https://www.linkedin.com/in/angela-aruanno/" target="blank"> <img class="img-round mb-3" src="/img/angela.jpg" alt=""></a>
            <a class="link" href="https://www.linkedin.com/in/angela-aruanno/" target="blank"><h6 class="nome">Angela Aruanno</h6></a>
            <p>Sono un Junior Full Stack Developer, con competenze e abilità nel front-end e back-end sviluppate durante il percorso intensivo di Aulab Hackademy. Ho tanta voglia di mettermi in gioco e accrescere le mie conoscenze.</p>
           
          </div>
            <div class="col-12 col-md-2 team-box pt-2 "data-aos="zoom-in-up">
            <a href="https://www.linkedin.com/in/armeninabox/" target="blank"> <img class="img-round mb-3" src="/img/armen2.jpg" alt=""></a>
            <a class="link" href="https://www.linkedin.com/in/armeninabox//" target="blank"><h6 class="nome">Armen Simonpour</h6></a>
            <p>Appassionato Full Stack Developer Junior con 14 anni di esperienza nell'industria musicale in Europa e Cina. Specializzato in HTML, CSS, JavaScript, PHP, Laravel e mySQL.</p>
            
          </div>
          <div class="col-12 col-md-2 team-box pt-2 "data-aos="zoom-in-up">
          <a href="https://www.linkedin.com/in/filippo-maria-lemmo-822250225/" target="blank"> <img class="img-round mb-3" src="/img/filippo2.jpg" alt=""></a>
            <a class="link" href="https://www.linkedin.com/in/filippo-maria-lemmo-822250225/" target="blank"><h6 class="nome">Filippo Maria Lemmo</h6></a>
            <p>Ciao, sono Filippo Maria Lemmo, ho 27 anni e sono un Junior Developer. Mi piace poter organizzare il team per un ottimizzazione dello sviluppo, adoro un feedback continuo da parte dei colleghi e ho un abilità equilibrata tra Front-end & Back-end.</p>
            
          </div>
          <div class="col-12 col-md-2 team-box pt-2 "data-aos="zoom-in-up">
          <a href="https://www.linkedin.com/in/paun-andrei/" target="blank"> <img class="img-round mb-3" src="/img/poun.jpg" alt=""></a>
            <a class="link" href="https://www.linkedin.com/in/paun-andrei/" target="blank"><h6 class="nome">Paun Andrei</h6></a>
            <p>Sono un Full stack developer ,con competenze acquisite con il corso di Aulab sia
            lato front end che back end. Sono in grado di progettare siti web moderni,adattabili
            nche per smartphone.</p>
          </div>

        </div>
    </section>


    <!-- contatti -->
    <div class="container-fluid">
        <div class="row d-flex justify-content-around rowicon ">
            <div class="col-12">
                <h2 class="text-center contatti my-5">{{__('ui.contatti')}}</h2>
            </div>
            <div class="col-12 col-md-3 my-4 my-md-0 text-center dropdown ">
            <i class="fa-brands fa-facebook my-4"data-aos="zoom-in-up"></i>
            </div>
            <div class="col-12 col-md-3  my-4 my-md-0 text-center dropdown">
            <i class="fa-brands fa-twitter my-4 "data-aos="zoom-in-up"></i>
            </div>
            <div class="col-12 col-md-3  my-4 my-md-0 text-center dropdown">
            <i class="fa-brands fa-instagram my-4"data-aos="zoom-in-up"></i>
            </div>
            <div class="col-12 col-md-3  my-4 my-md-0 text-center dropdown">
            <i class="fa-brands fa-linkedin my-4 "data-aos="zoom-in-up" ></i>
            </div>
        </div>
    </div>


    <!-- lavora con noi -->
    <div class="container-fluid  lavora-con-noi">
        <div class="row d-flex justify-content-center my-4 ">
            <div class="col-12 my-4">
                <h2 class="lavora text-center">{{__('ui.lavoraConNoi')}}</h2>
            </div>
            <div class="col-12 my-4">
                <p class="lavoratext text-center">{{__('ui.workDetails')}}</p>
            </div>
            <div class="col-12 my-4 d-flex justify-content-center">
            <a href="{{route('become.revisor')}}"><button class="btn btnlavora pulse">{{__('ui.clickHere')}}</button></a>
            </div>
        </div>
    </div>

</x-layout>

<x-main>
    {{-- Start banner --}}
    <header class="container masthead pt-5 mt-2">
      <div class="row h-100 align-items-center">
        <div class="col-12 col-lg-7 p-0 order-2 order-lg-1 position-relative">
            <div class="swiper header-carousel">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="img-fluid" src="http://picsum.photos/1200/850" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="img-fluid" src="http://picsum.photos/1203/850" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img class="img-fluid" src="http://picsum.photos/1206/850" alt="">
                    </div>
                </div>
                <button class="btn header-carousel-prev btn-carousel">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="btn header-carousel-next btn-carousel">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
          <div class="col-12 col-lg-5 px-3 px-xl-5 order-1 order-lg-2 text-center text-lg-start">
              <h1 class="display-5 fw-semibold mt-4">Trova i <span class="c-main">migliori affari</span> nella tua città!</h1>
              <p class="c-neutral my-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Blanditiis, provident. Ex, expedita? Molestiae fugit dolor corporis eaque quo quasi amet, atque perspiciatis provident voluptatem possimus debitis?</p>
              <a class="btn btn-main px-4 py-2" href="{{route('announcements.create')}}">Crea annuncio</a>
              <a class="btn btn-outline ms-3 px-4 py-2" href="#">Contattaci</a>
          </div>
      </div>
    </header> 
    
    {{-- Start Searchbar --}}
    <section>
            <div class="mt-5">
                <div class="container-lg py-5 bg-main bg-gradient rounded shadow px-3 mt-5 mt-lg-0">
                   <x-searchBar :datas="$categories"/>
                </div>
            </div>        
    </section>
    {{-- End Searchbar --}}
    <section class="pb-5">
      <section class="mt-5 mb-3">
        <div class="container-lg my-5 ">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-6 text-center">

              <h2 class="display-6 fw-medium">I nostri <span class="c-main ">annunci</span> in evidenza!</h2>
               <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.<br> <strong>Expedita, vel!</strong></p>
            </div>
          </div>
        </div>
      <div class="container px-5 my-5 ">
        <div class="row gx-5">
            @foreach ($announcements as $announcement)
                <x-card :data="$announcement"/>
            @endforeach               
        </div>
      </section>
    </section>
    
    {{-- job section --}}
@if(session()->has('success'))
<div class="alert text-white container bg-main">
    {{ session('success') }}
</div>
@endif
<div id="become_revisor" class="container bg-main shadow rounded bg-gradient">
    <aside class="bg-gradient rounded p-4 p-sm-5 mt-1">
     <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
            <div class="mb-4 mb-xl-0">
                <div class="fs-3 fw-bold">Vuoi lavorare <span class="text-light">con noi</span>?</div>
                <div class="text-50">Clicca sul link di fianco e invia la richiesta per diventare nostro revisore..</div>
            </div>
            <div class="ms-xl-4">
                <div>
                     <a href="{{route('become.revisor')}}" class="btn btn-dark">Invia Richiesta</a>
                </div>
             </div>
        </div>
    </aside>                                                                      
</div>


</x-main>

 
  


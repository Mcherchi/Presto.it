<x-main>
<div class="container-fluid p-5 bg-main bg-gradient shadow mb-4">
      <div class="row j">
            <div class="col-12 p-5">
                  <h1 class="display-4 fw-normal text-light">Dettaglio Annuncio: {{$announcement->title}}</h1>
            </div>
      </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-4 shadow">
     @error('rejection_reason') <div class="mt-2 mb-2 mx-auto alert alert-danger container mt-2 text-center">{{ $message }}</div> @enderror
     @if(session()->has('success'))<div class="mt-2 mb-2 mx-auto alert alert-success container mt-2">{{ session('success') }}</div>@endif
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="http://picsum.photos/500" class="img-fluid p-3 rounded d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="http://picsum.photos/501" class="img-fluid p-3 rounded d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="http://picsum.photos/502" class="img-fluid p-3 rounded d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="card-body p-4 text-center">
        <div class="badge bg-main bg-gradient rounded-pill mb-4"><a class="text-decoration-none" href="{{route('categoryShow', ['category' => $announcement->category])}}">{{$announcement->category->name}}</a></div>
        
            <h3 class="card-title mb-3">{{$announcement->title}}</h3>
       
        <p class="card-text mb-3">{{$announcement->body}}</p>
        <div class="small">
          <h6><span class="fw-bold">Prezzo: </span><span class="text-muted">{{$announcement->price}} €</span></h6>
        </div>
      </div>
      <div class="footer bg-white d-flex">
        <div class="col text-center py-2 c-main">
              <i class="fa-solid fa-tag"></i>
              {{$announcement->user->name}}
        </div>
        <div class="col text-center py-2 c-main">
              <i class="fa-solid fa-calendar-day"></i>
              {{$announcement->created_at->format('d/m/Y')}}
        </div>
      </div> 
      @if($announcement->is_accepted === null)
      <div class="d-flex mb-3 mt-3 align-items-center justify-content-center">
            <form action="{{route('revisor.accept_announcement', ['announcement' => $announcement])}}" method="POST">
            @csrf
            @method('PATCH')
                <button type="submit" class="btn-main px-3 py-2 me-3">Accetta</button>
            </form>
            {{-- <form action="{{route('revisor.reject_announcement', ['announcement' => $announcement])}}" method="POST">
            @csrf
            @method('PATCH')
                <button type="submit" class="btn-outline px-3  me-3 py-2">Rifiuta</button>
            </form>        --}}
            <button type="button" class="btn-outline px-3 me-3 py-2" data-bs-toggle="modal" data-bs-target="#rejectModal{{$announcement->id}}">Rifiuta</button>
        </div>
        @endif                  
    </div>
  </div>
</div>
 <x-rejectModal :data="$announcement"/>  
</x-main>

          


//
{{-- 
      <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Annuncio {{ $announcement->title }}</h1>
            </div>
        </div>
    </div>
       <div class=" mt-5 mb-5">
        <div class="container">
            <div class="row">

            <div class="col-12 col-lg-6 p-0 order-1 order-lg-2 position-relative">
                <div class="swiper header-carousel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="img-fluid" src="http://picsum.photos/1000" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="http://picsum.photos/1003" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="http://picsum.photos/1006" alt="">
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

                <div class="col-lg-6">
                    <div><h1> Titolo:{{$announcement->title }}</h1></div>
                        <div><p>prezzo: {{ $announcement->price }}€</p></div>
                        <div><p>Descizone: {{ $announcement->body }}</p></div>
                        <a class="btn btn-primary" href="{{route('categoryShow', ['category' => $announcement->category])}}">Categoria: {{$announcement->category->name}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
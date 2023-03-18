<x-main>
<div class="container-fluid p-3 bg-main bg-gradient shadow mb-4 text-center">
      <div class="row">
            <div class="col-12 p-2">
                  <h1 class="display-4 fw-normal text-light">Dettaglio Annuncio: {{$announcement->title}}</h1>
            </div>
      </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-6 col-lg-4 shadow mt-2">
     @error('rejection_reason') <div class="mt-2 mb-2 mx-auto alert alert-danger container mt-2 text-center">{{ $message }}</div> @enderror
     @if(session()->has('success'))<div class="mt-2 mb-2 mx-auto alert alert-success container mt-2">{{ session('success') }}</div>@endif
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          @foreach ($announcement->images as $image)
          <div class="carousel-item @if($loop->first) active @endif">
            <img src="{{$image->getUrl(400,300)}}" class="img-fluid p-3 rounded" alt="...">
          </div>
          @endforeach  
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-main rounded me-4" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-main rounded ms-4" aria-hidden="true"></span>
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
    </div>
    <div class="col-12 col-sm-10 col-md-4 col-lg-3 mt-2">
      <div class="card-body shadow text-center">
        <h5>Revisione Immagini</h1>
        <p>Adulti: <span class="ms-1 {{$image->adult}}"></span></p> 
        <p>Satira: <span class="ms-1 {{$image->spoof}}"></span></p>
        <p>Medicina: <span class="ms-1 {{$image->medical}}"></span></p>
        <p>Violenza: <span class="ms-1 {{$image->violence}}"></span></p>
        <p>Contenuto Ammicante: <span class="ms-1 {{$image->racy}}"></span></p>
      </div>
    </div>
    <div class="col-12 col-sm-10 col-md-4 col-lg-3 mt-2">
      <div class="shadow p-2">
        <h5>Tags</h5>
        @if($image->labels)
          @foreach ($image->labels as $label)
            <p class="d-inline">{{$label}},</p>
          @endforeach
        @endif
      </div>
  </div>
  </div>
</div>
 <x-rejectModal :data="$announcement"/>  
</x-main>
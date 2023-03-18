<x-main>
<div class="container-fluid p-5 bg-main bg-gradient shadow mb-4 text-center">
      <div class="row">
            <div class="col-12 p-5">
                  <h1 class="display-4 fw-normal text-light">Dettaglio Annuncio: {{$announcement->title}}</h1>
            </div>
      </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-4 shadow">
       @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
          <span class="carousel-control-prev-icon me-4 rounded bg-main" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon rounded bg-main ms-4" aria-hidden="true"></span>
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
      <div class="footer bg-white row">
        <div class="col text-center py-2 c-main">
              <i class="fa-solid fa-tag"></i>
              <a href="{{route('show.profile', $announcement->user)}}">{{$announcement->user->name ?? ''}}</a>
        </div>
         <div class="col text-center py-2 c-main" data-bs-toggle="collapse" type="button" data-bs-toggle="collapse" data-bs-target="#contactForm{{$announcement->id}}" aria-expanded="false" aria-controls="contactForm">
              <i class="fa-solid fa-envelope"></i>
              <span >Contatta</span>
        </div>
       @if(Auth::check())
        <div class="col text-center py-2 c-main">
            <div><a class="" href="/chatify/{{$announcement->user->id}}"><i class="fa-sharp fa-solid fa-comment"></i></a></div>
            <span class="text-decoration-none">chat</span>
        </div>
        @endif
        <div class="col text-center py-2 c-main">
              <i class="fa-solid fa-calendar-day"></i>
              <span>{{$announcement->created_at->format('d/m/Y')}}</span>
        </div>
       {{-- collapse --}}
      <div class="collapse w-100 text-center shadow mt-2" id="contactForm{{$announcement->id}}">
        <div class="card-body">
            <form action="{{route('infoSend')}}" method="POST">
                @csrf
               <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
               <input type="hidden" name="announcement_title" value="{{ $announcement->title }}">
               <img src="\assets\Risorsa-1.png" class="mb-4 mt-3" width="30" height="30" alt="">
               <h1 class="h5 mb-3 fw-normal">Richiedi informazioni</h1>
                <div class="form-floating mb-1">
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="name">
                    <label for="name">Nome*</label>
                    @error('name') <span class="small text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-floating mb-1">
                    <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="email">
                    <label for="email">Email*</label>
                    @error('email') <span class="small text-danger">{{$message}}</span>@enderror
                </div>
                 <div class="form-floating mb-1">
                    <textarea name="description" id="description" rows="10" class="form-control  @error('description') is-invalid @enderror" placeholder="Leave a comment here"></textarea>
                    <label for="floatingTextarea2">Descrizione...</label>
                    @error('description') <span class="error text-danger small">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-100 btn-main btn-lg py-2 mt-3 mb-1">Invia</button>
            </form>
        </div>
    </div>
    {{-- End collapse --}}
      </div> 
    </div>
  </div>
</div>  
</x-main>


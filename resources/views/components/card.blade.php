{{-- <div class="col-lg-4 mb-5">
    <div class="card h-100 shadow border-0">
        <img class="card-img-top" src="http://picsum.photos/1006" alt="..." />
        <div class="card-body p-4">
            <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$data->category->name}}</div>
            <a class="text-decoration-none link-dark stretched-link" href="#">
                <h5 class="card-title mb-3">{{$data->title}}</h5>
            </a>
            <p class="card-text mb-0">{{$data->body}}</p>
        </div>
        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
            <div class="d-flex align-items-end justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="small">
                        <div class="fw-bold">Prezzo</div>
                        <div class="text-muted">{{$data->price}} €</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="col-12 col-md-4 my-2">
    <div class="card shadow" style="width: 18rem">
        <img src="http://picsum.photos/1002" class="card-img-top p-3 rounded" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ $data->title }}</h5>
            <p class="small">Pubblicato da: {{$data->user->name ?? ''}} il: {{$data->created_at->format('d/m/Y')}}</p>
            <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$data->category->name}}</div>
            <p class="small">{{$data->price}}€</p>
            <p class="card-text">{{Str::substr($data->body, 0, 25)}}...</p>    
            <a href="{{route('announcements.show',$data)}}" class="btn btn-primary shadow">Visualizza dettagli</a>                                
        </div>
    </div>
</div>   --}}


<div id="card" class="col-lg-4 mb-5 h-50">
<div class="card  shadow border-0 h-50">
    <a class="text-decoration-none link-dark" href="{{route('announcements.show',$data)}}">
    <img class="card-img-top img-fluid" src="{{$data->images()->first()->getUrl(400,300)}}" alt="..." />
        <div class="card-body p-4">
        <div class="badge bg-main bg-gradient rounded-pill mb-4">{{$data->category->name}}</div>
            <h3 class="card-title mb-3">{{ $data->title }}</h3>
            <p class="card-text">{{Str::substr($data->body, 0, 25)}}...</p>
            <div class="d-flex align-items-end justify-content-between">
                <div class="d-flex mb-1 align-items-center">
                    <div class="small">
                        <h6><span class="fw-bold">Prezzo: </span><span class="text-muted">{{$data->price}}€</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <div class="card-footer pt-0 px-4 bg-transparent border-top-0">  
    <div class="footer row bg-white row align-items-center">
        <div class="col text-center me-1 py-2 c-main">
            <div><i class="fa-solid fa-tag"></i></div>
            <a href="{{route('show.profile', $data->user)}}">{{$data->user->name ?? ''}}</a>
        </div>
        <div class="col  text-center py-2 c-main"  data-bs-toggle="collapse" data-bs-target="#contact-form-{{$data->id}}" aria-expanded="false" aria-controls="contact-form-{{$data->id}}">
            <div><i class="fa-solid fa-envelope"></i></div>
            <span class="text-decoration-none">contatta</span>
        </div>
        <div class="col text-center py-2 c-main">
            <div><i class="fa-solid fa-calendar-day"></i></div>
            <span>{{$data->created_at->format('d/m/Y')}}</span>
        </div>
    </div>
    {{-- collapse --}}
      <div class="collapse w-100 text-center shadow mt-2" id="contact-form-{{$data->id}}">
        <div class="card-body">
            <form>
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
                <button class="w-100 btn-main btn-lg py-2 mt-3 mb-1">Invia</button>
            </form>
        </div>
    </div>
    {{-- End collapse --}}
    </div>
</div>
</div>

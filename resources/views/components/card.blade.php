<div id="card" class="col-lg-4 mb-5 h-50">
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
                        <h6><span class="fw-bold">{{__('ui.price')}}: </span><span class="text-muted">{{$data->price}}€</span></h6>
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
        @if(Auth::check())
        <div class="col text-center py-2 c-main">
            <div><a class="" href="/chatify/{{$data->user->id}}"><i class="fa-sharp fa-solid fa-comment"></i></a></div>
            <span class="text-decoration-none">chat</span>
        </div>
        @endif
        <div class="col text-center py-2 c-main">
            <div><i class="fa-solid fa-calendar-day"></i></div>
            <span>{{$data->created_at->format('d/m/Y')}}</span>
        </div>
    </div>
    {{-- collapse --}}
      <div class="collapse w-100 text-center shadow mt-2" id="contact-form-{{$data->id}}">
        <div class="card-body">
            <form action="{{route('infoSend')}}" method="POST">
                @csrf
               <input type="hidden" name="announcement_id" value="{{ $data->id }}">
               <input type="hidden" name="announcement_title" value="{{ $data->title }}">
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

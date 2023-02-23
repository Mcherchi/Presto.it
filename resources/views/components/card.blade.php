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


<div class="col-lg-4 mb-5">
<div class="card h-100 shadow border-0">
    <img class="card-img-top img-fluid" style="height: 20rem;" src="http://picsum.photos/1000" alt="..." />
    <div class="card-body p-4">
        <div class="badge bg-main bg-gradient rounded-pill mb-4">{{$data->category->name}}</div>
        <a class="text-decoration-none link-dark stretched-link" href="{{route('announcements.show',$data)}}">
            <h3 class="card-title mb-3">{{ $data->title }}</h3>
        </a>
        <p class="card-text mb-0">{{Str::substr($data->body, 0, 25)}}...</p>
    </div>
    <div class="card-footer pt-0 px-4 bg-transparent border-top-0">
        <div class="d-flex align-items-end justify-content-between">
            <div class="d-flex mb-3 align-items-center">
                <div class="small">
                    <h6><span class="fw-bold">Prezzo: </span><span class="text-muted">{{$data->price}}€</span></h6>
                </div>
            </div>
        </div>
        <div class="footer bg-white d-flex">
        <div class="col text-center py-2 c-main">
            <i class="fa-solid fa-tag"></i>
            {{$data->user->name ?? ''}}
        </div>
        <div class="col text-center py-2 c-main">
            <i class="fa-solid fa-calendar-day"></i>
            {{$data->created_at->format('d/m/Y')}}
        </div>
     </div>
    </div>
</div>
</div>

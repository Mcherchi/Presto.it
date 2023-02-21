<div class="col-lg-4 mb-5">
    <div class="card h-100 shadow border-0">
        <img class="card-img-top" style="heigth: 25rem;" src="http://picsum.photos/1006" alt="..." />
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
</div>
  
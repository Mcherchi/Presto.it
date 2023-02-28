<div class="card h-100 shadow border-0">
    <img class="card-img-top img-fluid" style="height: 20rem;" src="http://picsum.photos/1000" alt="..." />
    <div class="card-body p-4">
        <div class="badge bg-main bg-gradient rounded-pill mb-4">{{$data->category->name}}</div>

        <p class="card-text mb-1"><strong>#</strong> {{$data->id}}</p>
        <p class="card-text mb-1"><strong>N° rifiuti</strong> {{$data->count_rejected}}</p>
        <p class="card-text mb-1"><strong>Titolo annuncio:</strong> {{$data->title}}</p>
        
        <p class="card-text mb-1"><strong>Descrizione:</strong> {{Str::substr($data->body, 0, 25)}}...</p>
        <p class="card-text mb-1"><strong>Prezzo:</strong>{{$data->price}}</p>

        <p class="card-text mb-1"><strong>Autore:</strong> {{$data->user->name ?? ''}}</p>
        <p class="card-text mb-0"><strong>Data:</strong> {{$data->created_at->format('d/m/Y')}}</p>
    </div>
    <div class="card-footer pt-0 px-4 bg-transparent border-top-0">
        <div class="d-flex align-items-end justify-content-between">
            <div class="d-flex mb-3 align-items-center">
                <form action="{{route('revisor.accept_announcement', ['announcement' => $data])}}" method="POST">
                @csrf
                @method('PATCH')
                    <button type="submit" class="btn-main px-3 py-2 me-3">Accetta</button>
                </form>
                {{-- <form action="{{route('revisor.reject_announcement', ['announcement' => $data])}}" method="POST">
                @csrf
                @method('PATCH')
                    <button type="submit" class="btn-outline px-3  me-3 py-2">Rifiuta</button>
                </form> --}}
                <button type="button" class="btn-outline px-3 me-3 py-2" data-bs-toggle="modal" data-bs-target="#rejectModal{{$data->id}}">Rifiuta</button>
                <a href="{{route('announcements.show',$data)}}" class="btn-outline px-3 py-2 text-decoration-none"> Dettaglio</a>
            </div>
        </div>
    </div>
</div>



  
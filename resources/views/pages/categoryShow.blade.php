<x-main>
<div class="container-fluid p-5 bg-main bg-gradient shadow mb-4">
      <div class="row">
            <div class="col-12 p-5">
                  <h1 class="display-4 fw-normal text-light">Esplora la categoria: {{$category->name}}</h1>
            </div>
      </div>
</div>

<div class="container px-5 my-5">
      <div class="row gx-5">  
        @if ($announcements->count() > 0) 
            @foreach ($announcements as $announcement)
                   <x-card :data="$announcement"/> 
            @endforeach
       @else
            <div class="container ">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center m-auto mt-5 shadow">
                <p class="h3">Non sono presenti annunci per questa categoria!</p>
                <p><span class="h5">Creane uno tu,</span> <a href="{{ route('announcements.create') }}" class="btn-main text-decoration-none c-black px-3 py-1 ms-2">crea annuncio</a> </p>
                </div>
            </div>
            </div>
        @endif
      </div>
</div>
</x-main>

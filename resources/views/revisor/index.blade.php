<x-main>
<div class="container-fluid p-5 bg-main bg-gradient shadow mb-4">
  <div class="row ">
        <div class="col-12 p-5">
            <h1 class="display-4 fw-normal text-light">{{empty($announcment_to_check) ? 'Non ci sono annunci da revisionare' : 'Ecco gli annunci da revisionare'}}</h1>
        </div>
      </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-4 shadow">
      @if(session('success')) <div class="small text-success">{{session('success')}}</div>@endif
        <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">  
            @foreach ($announcment_to_check as $announcement)
              <div class="carousel-item @if($loop->first) active @endif">
                <x-announcement_to_check :data="$announcement"/>
              </div>       
            @endforeach     
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
    </div>
  </div>
</div>
</x-main>



<x-main>
<div class="container-fluid p-4 bg-main bg-gradient shadow mb-4">
  <div class="row ">
        <div class="col-12  text-center">
            <h1 class="display-4 fw-normal text-light">{{empty($announcment_to_check) ? __('ui.noReview') :  __('ui.yesReview')}}</h1>
        </div>
      </div>
</div>
{{-- <div class="row mt-2">
    
</div> --}}

<div class="container"> 
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-4 shadow">
      @error('rejection_reason') <div class="mt-2 mb-2 mx-auto alert alert-danger container mt-2 text-center">{{ $message }}</div> @enderror
      @if(session()->has('success'))<div class="mt-2 mb-2 mx-auto alert alert-success container mt-2">{{ session('success') }}</div>@endif
        <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">  
            @foreach ($announcment_to_check as $announcement)
              <div class="carousel-item @if($loop->first) active @endif">
                <x-announcement_to_check :data="$announcement"/>
              </div>   
            @endforeach     
          </div>
          <button class="carousel-control-prev mb-5" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon bg-main rounded" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next mb-5" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon bg-main rounded" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
      </div>    
    </div>
  </div>
</div>
@foreach ($announcment_to_check as $announcement)
  <x-rejectModal :data="$announcement"/>     
@endforeach
</x-main>


<x-main>
<div class="container-fluid p-1 bg-main bg-gradient shadow ">
<div class="row j">
    <div class="col-12 p-3">
        <h1 class="text-center display-4 fw-normal text-light">Profilo {{$user->name}}</h1>
    </div>
</div>
</div>
<div class="container bg-light shadow p-2">
      <div class="row align-items-center mb-1">
            <div class="col-12 col-md-6 text-center text-lg-end">
                   <img src="
                  @if($user->profile_image) 
                  {{Storage::url($user->profile_image)}} 
                  @else {{Storage::url($user->avatar)}}
                  @endif" class="img-bio m-4 shadow "
                  width="150" alt="Foto profilo">
            </div>
            <div class="col-12 col-md-6 text-center text-lg-start">
                 <p><strong>Nome: </strong>{{$user->name}}</p>
                 <p><strong>Email: </strong>{{$user->email}}</p>
                 <p><strong>Cell: </strong>{{$user->phone}}</p>         
            </div>
      </div>
      <hr>
      <div class="row mb-1 justify-content-center mt-1">
            <div class="col-12 col-md-3 text-center px-5">
                  <p class="col-sm-10 col-form-label fw-medium">Breve biografia</p>
            </div>
            <div class="col-12 col-md-4 mb-3">
                  <div class="bio col-12 overflow-y-auto">
                        <p class="m-3">{{$user->biography}}</p>
                  </div>
            </div>
      </div>
      <div class="row mb-3 justify-content-center mt-1">
            <div class="col-12 col-md-3 text-center px-5">
                  <p class="col-sm-10 col-form-label fw-medium">Data di Nascita</p>
            </div>
            <div class="col-12 col-md-4">
                  <p>{{$user->birth_date}}</p>
            </div>
      </div>
      <hr>
</div>
</x-main>
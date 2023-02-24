<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
  <div class="container-fluid container-lg px-xl-5">
    <a class="navbar-brand d-flex align-items-center" href="{{route('homepage')}}">
      <img alt="Logo" width="35" height="35" class="d-inline-block align-text-center" src="\assets\Risorsa-1.png">
      <h2 class="mb-0 ps-3 ">Presto.it</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Chi siamo</a>
        </li>
         <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{route('announcements.index')}}">Annunci</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Contatti</a>
        </li>
        @guest
        <a class="btn btn-outline btn-sm px-3 mx-3" href="{{route('login')}}">accedi</a>
        <a class="btn btn-main btn-sm px-3 me-3" href="{{route('register')}}">registrati</a>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           
          <i class="fa-solid fa-circle-user"></i> {{auth()->user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item nav-link btn-sm " href="{{route('announcements.create')}}">Crea Annunci</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item nav-link" id="btn-logout" onclick=" event.preventDefault(); getElementById('form-logout').submit()" href="/logout">Esci</a>
            </li>
            <form action="{{route('logout')}}" id="form-logout"  method="POST">
              @csrf
            </form>
          </ul>
        </li>
      </ul>
      @endguest
    </div>
  </div>
</nav>

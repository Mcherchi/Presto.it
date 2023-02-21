<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
  <div class="container-fluid container-lg px-xl-5">
    <a class="navbar-brand d-flex align-items-center" href="{{route('homepage')}}">
      <img src=".\assets\logo.png" alt="">
      <h2 class="mb-0 ps-3 c-main fw-semibold">Presto.it</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
        </li>
        @guest
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-circle-user"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">Registati</a></li>
          </ul>
        @else
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{auth()->user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" id="btn-logout" href="#">Esci</a>
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
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
          <a class="nav-link " aria-current="page" href="{{route('announcements.index')}}">Annunci</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Chi siamo</a>
        </li>
        @auth
          @if(auth()->user()->is_revisor === 0)
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#become_revisor">Lavora con noi</a>
          </li>
          @endif
        @endauth
         
        @guest
         <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#become_revisor">Lavora con noi</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-main btn-sm px-3 mx-3" href="{{route('login')}}">accedi</a>
        </li>
        @else
         @if (Auth::user()->is_revisor)
              <li class="position-relative me-2 ms-2">            
                <a class="nav-link btn-sm btn-main px-2 py-1" href="{{route('revisor.index')}}">Revisiona Annunci</a>
                 @if(App\Models\Announcement::toBeRevisionedCount() > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> 
                  {{App\Models\Announcement::toBeRevisionedCount()}}
               <span class="visually-hidden">revisioni da effettuare</span>
               </span>
               @endif
              </li>   
          @endif

           <li class="position-relative me-2 ms-2">                           
           <a class="nav-link btn-sm btn-outline px-2 py-1" href="{{ route('chatify') }}"><i class="fa-sharp fa-solid fa-comment"></i></a>
           @if(App\Models\ChMessage::chMessageCount() > 0) 
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"> 
              {{App\Models\ChMessage::chMessageCount()}}
           <span class="visually-hidden">Messaggi non letti</span>
           </span>
           @endif                      
          </li>
          
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          @if(auth()->user()->profile_image)
              <img src="{{ Storage::url(auth()->user()->profile_image) }}" alt="{{ auth()->user()->name }}" class="rounded-circle me-2" style="width: 30px; height: 30px;">    
              {{auth()->user()->name}}
              @else
              <img src="{{Storage::url(auth()->user()->avatar)}}" alt="{{ auth()->user()->name }}" class="rounded-circle me-2" style="width: 30px; height: 30px;">
             {{-- <i class="fa-solid fa-circle-user"></i> {{auth()->user()->name}} --}}
          @endif   
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item nav-link btn-sm " href="{{route('announcements.create')}}">Gestione Annunci</a></li>
            <li><a class="dropdown-item nav-link btn-sm" href="{{route('profile.edit')}}"><i class="fa-solid fa-circle-user me-2"></i>Profilo</a></li>       
            <li><hr class="dropdown-divider w-100"></li>
            <li>
              <a class="dropdown-item nav-link" id="btn-logout" onclick=" event.preventDefault(); getElementById('form-logout').submit()" href="/logout">Esci</a>
            </li>
            <form action="{{route('logout')}}" id="form-logout"  method="POST">
              @csrf
            </form>
          </ul>
        </li>  
      @endguest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-flag"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
                <x-_locale lang="it" nation="it"/>
            </li>
              <li class="nav-item">
                <x-_locale lang="en" nation="gb"/> 
            </li>
            </ul>
          </li>
      </ul>         
    </div>                  
</nav>

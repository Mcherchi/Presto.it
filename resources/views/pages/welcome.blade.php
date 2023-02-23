<x-main>
    <div class="container mt-5">
      <div class="row align-items-center">
            <div class="col-7">
                  <img class="img-fluid" src="http://picsum.photos/1000/500" alt="">
            </div>
            <div class="col-5">
                  <h2 class="display-5 fw-semibold mt-4">Benvenuto su <span class="c-main">Presto.it</span>!</h2>
                  <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa consequatur reiciendis hic? Rerum, ipsa architecto!<br>
                        <strong>Iniziamo subito!</strong> Che cosa vuoi fare?</p>
                  <a class="btn btn-main px-4 py-2" href="{{route('announcements.create')}}">Crea annuncio</a>
                  <a class="btn btn-outline ms-3 px-4 py-2" href="{{route('announcements.index')}}">tutti gli annunci</a>
            </div>
      </div>
    </div>

</x-main>
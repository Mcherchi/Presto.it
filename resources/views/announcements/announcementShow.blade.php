<x-main>
      <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Annuncio {{ $announcement->title }}</h1>
            </div>
        </div>
    </div>
       <div class=" mt-5 mb-5">
        <div class="container">
            <div class="row">

            <div class="col-12 col-lg-6 p-0 order-1 order-lg-2 position-relative">
                <div class="swiper header-carousel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="img-fluid" src="http://picsum.photos/1000" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="http://picsum.photos/1003" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid" src="http://picsum.photos/1006" alt="">
                        </div>
                    </div>
                    <button class="btn header-carousel-prev btn-carousel">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button class="btn header-carousel-next btn-carousel">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
            </div>

                <div class="col-lg-6">
                    <div><h1> Titolo:{{$announcement->title }}</h1></div>
                        <div><p>prezzo: {{ $announcement->price }}€</p></div>
                        <div><p>Descizone: {{ $announcement->body }}</p></div>
                        <a class="btn btn-primary" href="{{route('categoryShow', ['category' => $announcement->category])}}">Categoria: {{$announcement->category->name}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>


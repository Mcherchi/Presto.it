<x-main>
<header class="container masthead pt-5 mt-5">
    <div class="row h-100 align-items-center">
        <div class="col-12 col-lg-6 px-3 px-xl-5 order-2 order-lg-1 text-center text-lg-start">
            <h1 class="display-4 fw-semibold mt-4">Trova i <span class="c-main">migliori affari</span> nella tua città</h1>
            <p class="c-neutral my-5">troverai che cerchi da sempre qui, su presto.it</p>
            <a class="btn btn-main px-5 py-3" href="#">Inizia ora</a>
        </div>
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
    </div>
</header>
<section>
    <div class="mt-5">
        <div class="container-lg py-5 bg-main px-3 mt-5 mt-lg-0">
            <div class="row align-items-center">
                <div class="col-12 col-md-10 d-flex flex-wrap">
                    <div class="form-floating col-12 col-md mb-3 me-3">
                       <select class="form-select" name="" id="floatingSelect" aria-label="seleziona un'opzione">
                            <option selected>Seleziona categoria</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                       </select>
                       <label for="floatingSelect">Seleziona</label>
                    </div>                    
                </div>
                <div class="col-12 col-md-2">
                    <button class="btn btn-dark py-3 w-100 mb-3">
                        Cerca
                    </button>
                </div>
            </div>
        </div>
        </div>
</section>
<section class="py-5">
    <div class="container px-5 my-5 ">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder">I nostri articoli in evidenza</h2>
                </div>
                <div class="row gx-5">
                    @foreach ($announcements as $announcement)
                        <x-card :data="$announcement"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

</x-main>
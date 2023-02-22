<x-main>
    {{-- Start banner --}}
    <header class="container masthead pt-5 mt-5">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-6 px-3 px-xl-5 order-2 order-lg-1 text-center text-lg-start">
                <h1 class="display-4 fw-semibold mt-4">Trova i <span class="c-main">migliori affari</span> nella tua città</h1>
                <p class="c-neutral my-5">troverai che cerchi da sempre qui, su presto.it</p>
                <a class="btn btn-main px-5 py-3" href="#">Inizia ora</a>
            </div>
    {{-- End banner --}}
            
            {{-- Start Carousel --}}
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
            {{-- End Carousel --}}           
        </div>
    </header>
    
    {{-- Start Searchbar --}}
    <section>
            <div class="mt-5">
                <div class="container-lg py-5 bg-main px-3 mt-5 mt-lg-0">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-10 d-flex flex-wrap">
                            <div class="form-floating col-12 col-md mb-3 me-3">                               
                                <select id="SelectCategory" class="form-select" name=""  aria-label="seleziona un'opzione">
                                        <option selected>Seleziona categoria</option>
                                     @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                     @endforeach 
                                </select>                           
                                        <label>Seleziona</label>
                            </div>                    
                        </div>
                        <div class="col-12 col-md-2">
                            <button id="submit-btn" class="btn btn-success">Cerca</button>
                        </div>
                    </div>
                </div>
            </div>        
    </section>
    {{-- End Searchbar --}}
    
    {{-- Start Show last six articles --}}
    <section class="py-5">
        <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <x-card :data="$announcement"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </section>
    {{-- End Show last six articles --}}
</x-main>

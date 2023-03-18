<footer class="container-fluid mt-5 bg-dark text-white-50 footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay:0.1s; animation-name:fadeIn;">
    <div class="container py-5">
        <div class="row g-5 justify-content-between">
            <div class="col-lg-4 col-md-6">
                <h5 class="c-main mb-4">Get in touch</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Via Cagliari 25, Cagliari(CA)</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0781-505060</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@presto.it</p>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class=" c-main mb-4">Quick Links</h5>
                <a class="btn btn-link text-white-50" href="{{route('aboutUs')}}">About us</a>
                <a class="btn btn-link text-white-50" href="{{route('announcements.index')}}">Announcements</a>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="c-main mb-4">Newsletters</h5>
                <p>Insciviti per avere le migliori informazioni presenti sul mercato</p>
                <div class="position-relative mx-auto">
                    <input type="email" class="form-control bg-transparent  py-3 ps-4 pe-5 text-white" placeholder="inserisci la tua mail">
                    <button type="button" class="btn btn-main py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="copyright">
            <div class="row">
                <div class="col-12 text-center mb-3 mb-md-0">
                    <a href="" class="border-bottom">Presto.it</a>,  All Right Reserved {{date('Y')}}
                </div>
            </div>
        </div>
    </div>
</footer>
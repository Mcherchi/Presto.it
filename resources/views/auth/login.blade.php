<x-main>
<section class="container form-signin w-100 m-auto">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-3 text-center m-auto mt-5 shadow">
            <form action="/login" method="POST">
            @csrf
                <img src="\assets\Risorsa-1.png" class="mb-4 mt-3" width="50" height="50" alt="">
                <h1 class="h3 mb-3 fw-normal">Accedi</h1>
                <div class="form-floating mb-1">
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                    <label for="email">Email</label>
                    @error('email') <span class="small text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password') <span class="small text-danger">{{$message}}</span> @enderror
                    @if(session('status')) <span class="small text-success">{{session('status')}}</span>@endif
                </div>
                <a href="/forgot-password" class="small c-black">Hai dimenticato la password?</a>
                <button class="w-100 btn-main btn-lg py-2 mt-3 mb-1">Accedi</button>
                <p class="small"><a href="/register" class="text-decoration-none c-main fw-semibold">Registrati</a>, oppure continua con:</p>
                <p class="mb-2 text-muted small">Continua con:</p>

                <a href="/auth/github/redirect" class="btn btn-git w-100 btn-lg py-2 mb-2">
                    <i class="fa-brands fa-github me-2"></i> Continua con Google
                </a>         
                <a href="/auth/google/redirect" class="btn btn-google w-100 btn-lg py-2 mt-1 mb-2">
                    <i class="fa-brands fa-google"></i> Continua con Google
                </a>
                <p class="mb-3 text-muted small">© {{date('Y')-1}}/{{date('Y')}}</p>
            </form>
        </div>
      </div>
</section> 
</x-main>

<p class="small"> <a href="" class="text-decoration-none c-main fw-semibold">Registrati</a>, oppure continua con:</p>
<div class="d-grid mb-2">
    <button class="btn-google btn-lg py-2 mt-1 mb-1" type="submit">
    <i class="fab fa-google me-2"></i> Continua con Google
    </button>
</div>

<div class="d-grid">
    <button class="btn-git w-100 btn-lg py-2 mb-3" type="submit">
    <i class="fa-brands fa-github me-2"></i> Continua con GitHub
    </button>
</div>
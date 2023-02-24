<x-main>
<main class="container form-signin w-100 m-auto">
      <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-3 text-center m-auto mt-5 shadow">
                  <form action="/register" method="POST">
                    @csrf
                        <img src="assets\Risorsa-1.png" class="mb-4 mt-3" width="50" height="50" alt="">
                        <h1 class="h3 mb-3 fw-normal">Registrati</h1>
                        <div class="form-floating mb-1">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="name">
                            <label for="name">Nome</label>
                            @error('name') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-1">
                            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="email">
                            <label for="email">Email</label>
                            @error('email') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-1">
                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="password">
                            <label for="password">Password</label>
                            @error('password') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" id="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="password">
                            <label for="password">Conferma password</label>
                            @error('password_confirmation') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <p class="small">Sei già dei nostri? <a href="/login" class="small c-black">Accedi</a></p>
                        <button class="w-100 btn-main btn-lg py-2 mt-3 mb-5">Registrati</button>
                        <p class="mb-3 text-muted small">© {{date('Y')-1}}/{{date('Y')}}</p>
                  </form>
            </div>
      </div>
</main>
</x-main>


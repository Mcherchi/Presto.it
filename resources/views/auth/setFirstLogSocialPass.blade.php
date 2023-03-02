<x-main>
<div class="container mt-5">
<div class="row align-items-center">
<div class="col-12">
    <h2 class="display-5 fw-semibold mt-4">Benvenuto su <span class="c-main">Presto.it</span>!</h2>
    <p>
        <strong>Prima</strong> di iniziare <strong>Imposta una Password</strong>
    </p>
</div>
<div class="col-7">
    <img class="img-fluid" src="http://picsum.photos/1000/500" alt="">
</div>
<div class="col-5">
    <form action="{{route('password.set')}}" method="POST">
    @csrf
        <img src="\assets\Risorsa-1.png" class="mb-4 mt-3" width="50" height="50" alt="">
        <h1 class="h3 mb-3 fw-normal">Imposta Password</h1>
        <div class="form-floating mb-1">
            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="password">
            <label for="password">Nuova Password</label>
            @error('password') <span class="small text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="password">
            <label for="password">Conferma password</label>
        </div>
        <button class="w-100 btn-main btn-lg py-2 mt-3 mb-5">Imposta Password</button>
        <p class="mb-3 text-muted small text-center">© {{date('Y')-1}}/{{date('Y')}}</p>
    </form>
</div>
</div>
</div>
</x-main>

  

      
<x-main>
<main class="container form-signin w-100 m-auto">
      <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-4 text-center m-auto mt-5 shadow">
                <form action="/forgot-password" method="POST">
                @csrf
                    <img src="assets\Risorsa-1.png" class="mb-4 mt-3" width="50" height="50" alt="">
                    <h1 class="h3 mb-3 fw-normal">{{__('ui.recover')}}</h1>
                    <p>{{__('ui.text')}}</p>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="email">
                        <label for="email">Email</label>
                        @error('email') <span class="small text-danger">{{$message}}</span> @enderror
                        @if(session('status')) <span class="small text-success">{{session('status')}}</span>@endif
                    </div>
                    <button class="w-100 btn-main btn-lg py-2 mt-3 mb-5">{{__('ui.recoverPass')}}</button>
                    <p class="mb-3 text-muted small">© {{date('Y')-1}}/{{date('Y')}}</p>
                </form>
            </div>
      </div>
</main>
</x-main>



<x-main>
<main class="container form-signin w-100 m-auto">
      <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-4 text-center m-auto mt-5 shadow">
                  <form action="/reset-password" method="POST">
                    @csrf
                        <input type="hidden" name="token" value="{{ request()->route('token') }}">
                        <input type="hidden" name="email" id="email" class="form-control" value="{{request()->email}}">
                        <img src="\assets\Risorsa-1.png" class="mb-4 mt-3" width="50" height="50" alt="">
                        <h1 class="h3 mb-3 fw-normal">{{__('ui.reset')}}</h1>
                        <div class="form-floating mb-1">
                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" placeholder="password">
                            <label for="password">{{__('ui.newPass')}}</label>
                            @error('password') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="password">
                            <label for="password">{{__('ui.confirmPass')}}</label>
                        </div>
                        <button class="w-100 btn-main btn-lg py-2 mt-3 mb-5">{{__('ui.resetPass')}}</button>
                        <p class="mb-3 text-muted small">© {{date('Y')-1}}/{{date('Y')}}</p>
                  </form>
            </div>
      </div>
</main>
</x-main>


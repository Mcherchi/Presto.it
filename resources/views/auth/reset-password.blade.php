<x-main>
    <div class="container mt-5 p-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Reimposta Password</h1>
                <form action="/reset-password" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ request()->route('token') }}">
                    <input type="hidden" name="email" id="email" class="form-control" value="{{request()->email}}">
                    <div class="row g-3">
                       
                        <div class="col-12">
                            <label for="password">Nuova Password</label>
                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror">
                        </div>
                        <div class="col-12">
                            <label for="password_confirmation">Conferma Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Modifica Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
<x-main>
    {{--implementare form login  --}}

    <div class="container mt-5 p-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Accedi</h1>
                <form action="/login" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email') <span class="small text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password') <span class="small text-danger">{{$message}}</span> @enderror
                            @if(session('status')) <span class="small text-success">{{session('status')}}</span>@endif
                        </div>
                        </div>
                        <div class="col-12">
                            <a href="/forgot-password" class="small">Hai dimenticato la password ?</a>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Accedi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
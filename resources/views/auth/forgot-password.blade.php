<x-main>
    <div class="container mt-5 p-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="mb-4">Recupero Password</h1>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <form action="/forgot-password" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}">
                             @error('email') <span class="small text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Recupera Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
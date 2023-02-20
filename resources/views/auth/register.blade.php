<x-main>
    <div class="container mt-5 p-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="/register" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}">
                             @error('email') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror">
                             @error('password') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation') <span class="small text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Registrati</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
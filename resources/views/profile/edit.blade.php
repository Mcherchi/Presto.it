<x-main>
<div class="container-fluid p-2 bg-main bg-gradient shadow ">
    <div class="row">
        <div class="col-12 p-2">
                <h1 class="text-center display-4 fw-normal text-light">Modifica profilo personale</h1>
        </div>
    </div>
</div>
<div class="container-lg bg-light shadow">
       @if(session()->has('success'))<div class="mt-2 mb-2 mx-auto alert alert-success container mt-2">{{ session('success') }}</div>@endif
   <form action="{{route('update.profile')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row align-items-center justify-content-center mb-2">
        <div class="col-12 col-md-12 text-center ">
            <img src="
            @if($user->profile_image) 
            {{Storage::url($user->profile_image)}} 
            @else {{Storage::url($user->avatar)}}
            @endif" class="img-bio m-4 shadow "
            width="150" alt="Foto profilo">
        </div>
        <div class="col-12 col-md-4 text-center">
            <label for="profile_image"></label>
            <input id="profile_image" type="file" name="profile_image" class="form-control">
        </div>
    </div>
    <div class="row align-items-center justify-content-center mb-2">
        <div class="col-8 col-md-4 mt-4 mb-2">
            <label for="name" class="mb-1 text-start">Nome</label>
            <input type="name" class="mb-2 form-control shadow @error('name') is-invalid @enderror" placeholder="name" name="name" id="inputName" value="{{ $user->name }}">
            @error('name') <span class="small text-danger">{{$message}}</span>@enderror
        </div>
        <div class="col-8 col-md-4 mt-4 mb-2">
            <label for="email" class="mb-1 text-start">email</label>
            <input type="email" class="mb-2 form-control shadow @error('email') is-invalid @enderror" placeholder="email" name="email" id="inputEmail" value="{{ $user->email }}">
            @error('email') <span class="small text-danger">{{$message}}</span>@enderror
        </div>
    </div>

     <div class="row align-items-center justify-content-center mb-2">
         <div class="col-8 col-md-4 mt-4 mb-2">
            <label for="phone" class="mb-1 text-start">Cell</label>
            <input type="text" class="mb-2 form-control shadow" placeholder="+39" name="phone" id="inputPhone" value="{{$user->phone}}">
        </div>
        <div class="col-8 col-md-4 mt-4 mb-2">
            <label for="date" class="mb-1 text-start">Data di nascita</label>
            <input type="date" class="mb-2 form-control shadow" placeholder="data di nascita" name="birth_date" id="birth_date" value="{{ $user->birth_date }}">
        </div>
    </div>

    <div class="row align-items-center justify-content-center mb-2">
         <div class="col-8 col-md-4 mt-4 mb-2">
            <label for="password" class="mb-1 text-start">Modifica Password</label>
            <input type="password" class="mb-2 form-control shadow @error('password') is-invalid @enderror" placeholder="password" name="password" id="inputPassword">
            @error('password') <span class="small text-danger">{{$message}}</span>@enderror
        </div>
        <div class="col-8 col-md-4 mt-4 mb-2">
            <label for="password_confirmation" class="mb-1 text-start">Conferma Password</label>
            <input type="password" class="mb-2 form-control shadow" placeholder="Conferma Password" name="password_confirmation" id="password_confirmation">
        </div>
    </div>
      <div class="row align-items-center justify-content-center mb-2">
         <div class="col-8 col-md-4 mt-4 mb-2">
             <label for="description">Biografia</label>
                <textarea name="biography" id="biography" rows="5" class="form-control">{{$user->biography}}</textarea>                  
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="text-center">
                <button type="submit" class="btn btn-main btn-lg px-3 me-3 mb-5">salva modifiche</button>
        </div>
      </div>
   </form> 
</div>
</x-main>
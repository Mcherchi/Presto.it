<form  wire:submit.prevent="store">
    <img src="\assets\Risorsa-1.png" class="mb-4" width="50" height="50" alt="">
    @if($mode === 'create')
    <h1 class="h3 mb-3 fw-normal">Crea il tuo Annuncio</h1>
    @else
        <h2  class="h3 mb-3 fw-normal">Modifica Annuncio</h2>
    @endif
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="form-floating mb-1">
            <select wire:model.defer="category" class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Scegli la Categoria</option>
             @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach  
            </select>
            <label for="floatingSelect">Categoria</label>
        </div>
    <div class="form-floating mb-1">
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" wire:model.lazy="title" placeholder="title">
            <label for="title">Titolo annuncio</label>
            @error('title') <span class="error text-danger small">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating mb-1">
            <textarea name="body" id="body" rows="10" class="form-control  @error('body') is-invalid @enderror" wire:model.lazy="body"  placeholder="Leave a comment here"></textarea>
            <label for="floatingTextarea2">Descrizione...</label>
            @error('body') <span class="error text-danger small">{{ $message }}</span> @enderror
    </div>
    <div class="form-floating mb-3">
            <input type="price" name="price" id="price" class="form-control @error('price') border-danger @enderror" wire:model.lazy="price" placeholder="password">
            <label for="price">Prezzo</label>
            @error('price') <span class="error text-danger small">{{ $message }}</span> @enderror
    </div>

    @if($mode === 'create')
     <p class="small px-2">Prima di venire pubblicato, il tuo annuncio verrà controllato da un nostro revisore </p>
    @else
     <p class="small px-2">Prima di venire modificato, il tuo annuncio verrà controllato da un nostro revisore </p>
    @endif

    @if($mode === 'create')
    <button type="submit" class="w-100 btn-main btn-lg py-2 mt-3 mb-5">Salva Annuncio</button>
    @else
     <button type="submit" class="w-100 btn-main btn-lg py-2 mt-3 mb-5">Modifica Annuncio</button>
    @endif
    <p class="mb-3 text-muted small">© {{date('Y')-1}}/{{date('Y')}}</p>
</form>
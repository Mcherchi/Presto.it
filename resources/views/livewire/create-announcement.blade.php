<form wire:submit.prevent="store">
    <div class="row g-3">
         <div>
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="col-12  mb-2">
            <label for="category">Categoria</label>
            <select wire:model.defer="announcement.category" class="form-select form-control @error('category') is-invalid @enderror" aria-label="Default select example">
                <option selected>Scegli la categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach  
            </select>
        </div>
        <div class="col-12"> 
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" wire:model.lazy="announcement.title">
            @error('title') <span class="error text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label for="body">Descrizione</label>
            <textarea name="body" id="body" rows="10" class="form-control  @error('body') is-invalid @enderror" wire:model.lazy="announcement.body" ></textarea>
            @error('body') <span class="error text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label for="price">Prezzo</label>
            <input type="price" name="price" id="price" class="form-control @error('price') border-danger @enderror" wire:model.lazy="announcement.price">
            @error('price') <span class="error text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salva Annuncio</button>
        </div>
    </div>
</form>


<form wire:submit.prevent="store">
    <div class="row g-3">
        <div class="col-12">
            <div>
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('announcement.title') is-invalid @enderror" wire:model.lazy="announcement.title">
            @error('announcement.title') <span class="error text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label for="body">Descrizione</label>
            <textarea name="body" id="body" rows="10" class="form-control  @error('announcement.body') is-invalid @enderror" wire:model.lazy="announcement.body" ></textarea>
            @error('announcement.body') <span class="error text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <label for="price">Prezzo</label>
            <input type="price" name="price" id="price" class="form-control @error('announcement.price') border-danger @enderror" wire:model.lazy="announcement.price">
            @error('announcement.price') <span class="error text-danger small">{{ $message }}</span> @enderror
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salva Annuncio</button>
        </div>
    </div>
</form>


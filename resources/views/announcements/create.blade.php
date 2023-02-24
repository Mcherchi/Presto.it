<x-main>
    <div class="container-lg mt-4 mb-4 ms-auto">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="bg-light p-4 rounded">
                    <livewire:create-announcement />
                </div> 
            </div>
            <div class="col-12 col-md-8">
                <div class="bg-light p-4 rounded">
                    <livewire:list-announcements />
                </div> 
            </div>
        </div>
    </div>
</x-main>

   
                
             
      

{{-- <div class="table-responsive">
  <table class="table table-striped table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Titolo</th>
        <th scope="col">Categoria</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Data Creazione</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($announcements as $announcement)
        <tr>
          <td>{{ $announcement->title }}</td>
          <td>{{ $announcement->category->name }}</td>
          <td>{{ $announcement->price }}</td>
          <td>{{ $announcement->created_at->format('d/m/Y') }}</td>
          <td>
            <div class="btn-group" role="group" aria-label="Azioni">
              <button type="button" class="btn btn-sm btn-secondary" wire:click="editAnnouncement({{ $announcement->id }})">Modifica</button>
              <button type="button" class="btn btn-sm btn-danger" onclick="confirm('Sei sicuro di voler eliminare questo annuncio?') || event.stopImmediatePropagation()" wire:click="deleteAnnouncement({{ $announcement->id }})">Elimina</button>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div> --}}
<div class="table-responsive">
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
          <td class="text-end">
              <button type="button" class="btn btn-sm btn-secondary" wire:click="editAnnouncement({{ $announcement->id }})">Modifica</button>
              <button type="button" class="btn btn-sm btn-danger"  wire:click="deleteAnnouncement({{ $announcement->id }})">Elimina</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>



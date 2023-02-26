<table class="table">
    <thead>
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
              <button type="button" class="btn-outline px-2 py-1" wire:click="editAnnouncement({{ $announcement->id }})">Modifica</button>
              <button type="button" class="btn-main px-2 py-1"  wire:click="deleteAnnouncement({{ $announcement->id }})">Elimina</button>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>

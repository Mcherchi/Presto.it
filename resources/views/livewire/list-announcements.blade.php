<table class="table">
    <thead>
      <tr>
        <th scope="col">Titolo</th>
        <th scope="col">Categoria</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Data Creazione</th>
        <th scope="col" class="text-center"><a href="{{route('announcements.create')}}" class="btn btn-main px-2 py-1 text-center mt-3 text-decoration-none">Crea Annuncio</a></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($announcements as $announcement)
        <tr>
          <td>{{ $announcement->title }}</td>
          <td>{{ $announcement->category->name }}</td>
          <td>{{ $announcement->price }}</td>
          <td>{{ $announcement->created_at->format('d/m/Y') }}</td>
          <td class="text-center">
             
             @if($announcement->is_accepted === 1)
              <button type="button" class="btn-outline px-2 py-1" wire:click="editAnnouncement({{ $announcement->id }})">Modifica</button>
              <button type="button" class="btn-main px-2 py-1"  wire:click="deleteAnnouncement({{ $announcement->id }})">Elimina</button>
              @elseif ($announcement->is_accepted === 0)
                 @if($announcement->count_rejected > 2)
              <span class="smale text-danger ms-2 me-2">Rifiutato Definitivamente</span>
              <button type="button" class="btn-main px-2 py-1"  wire:click="deleteAnnouncement({{ $announcement->id }})">Elimina</button>
              <i class="fa-regular fa-envelope rubberBand" data-bs-toggle="modal" data-bs-target="#exampleModal{{$announcement->id}}"></i>
              @else
              <span type="button" class="btn-outline px-2 py-1" wire:click="editAnnouncement({{ $announcement->id }})">Modifica</span>
              <span class="smale text-danger ms-2">Rifiutato</span>
              <i class="fa-regular fa-envelope rubberBand" data-bs-toggle="modal" data-bs-target="#exampleModal{{$announcement->id}}"></i>
              @endif   
              @elseif ($announcement->is_accepted === null)
              <p class="smale text-success">In revisione</p>
            @endif     
          </td>
        </tr>
      @endforeach
    </tbody>
</table>

@foreach ($announcements as $announcement)
 <x-messageModal :announcement="$announcement"/>
@endforeach

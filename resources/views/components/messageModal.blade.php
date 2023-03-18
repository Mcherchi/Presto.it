 <div class="modal fade" id="exampleModal{{$announcement->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <img src="\assets\Risorsa-1.png" class="mb-4 me-2" width="50" height="50" alt="">
          <h5 class="modal-title" id="exampleModalLabel">{{__('ui.motiv')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{$announcement->rejection_reason}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-outline px-2 py-1" data-bs-dismiss="modal">{{__('ui.close')}}</button>
        </div>
      </div>
    </div>
</div>
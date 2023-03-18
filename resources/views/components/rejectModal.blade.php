<div class="modal fade" id="rejectModal{{$data->id}}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <img src="\assets\Risorsa-1.png" class="mb-4 me-2" width="50" height="50" alt="">
            <h5 class="modal-title" id="rejectModalLabel">{{__('ui.rejectedAnn')}}: {{$data->title}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('revisor.reject_announcement', ['announcement' => $data])}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="rejection_reason" class="form-label">{{__('ui.motivRej')}}:</label>
                    <textarea class="form-control @error('rejection_reason') is-invalid @enderror" id="rejection_reason" name="rejection_reason" rows="3"></textarea>
                     @error('rejection_reason') <span class="error text-danger small">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-100 btn-main btn-lg py-2 mt-3 mb-5">{{__('ui.rejAnn')}}</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
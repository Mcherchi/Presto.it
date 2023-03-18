@if(session()->has('success'))
<div class="alert text-white container bg-success mt-2">
    {{ session('success') }}
</div>
@endif
<div id="become_revisor" class="container bg-main shadow rounded bg-gradient mt-3">
    <aside class="bg-gradient rounded p-4 p-sm-5 mt-1">
     <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
            <div class="mb-4 mb-xl-0">
                <div class="fs-3 fw-bold">{{__('ui.dywtw')}} <span class="text-light">{{__('ui.withUs')}}</span>?</div>
                <div class="text-50">{{__('ui.clickOn')}}..</div>
            </div>
            <div class="ms-xl-4">
                <div>
                     <a href="{{route('become.revisor')}}" class="btn btn-dark">{{__('ui.sendReq')}}</a>
                </div>
             </div>
        </div>
    </aside>                                                                      
</div>
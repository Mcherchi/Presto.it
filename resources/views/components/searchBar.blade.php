 <div class="row align-items-center">
    <div class="col-12 col-md-10 row">
            <form id="form-search" class="form-floating col-12 col-md mb-3 me-3" action="{{route('announcements.search')}}" method="GET">
                @csrf
                <input class="form-control" id="searchInput" name="searched" placeholder="cerca" type="search" aria-label="Cerca">
                <label class="px-3 py-2 small" for="searchInput">{{__('ui.search')}}</label>
            </form>
        <div class="form-floating col-12 col-md mb-3">                               
            <select id="SelectCategory" class="form-select" aria-label="seleziona un'opzione">  
                <option value="" selected></option>    
                    @foreach ($datas as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach 
            </select>                           
            <label class="p-3">{{__('ui.selectCategory')}}</label>
        </div> 
    </div> 
    <div class="col-12 col-md-2">
        <button type="submit" id="submit-btn" class="btn btn-lg btn-dark w-100 py-3 mb-3">{{__('ui.search')}}</button>
    </div>                 
</div>
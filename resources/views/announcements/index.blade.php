<x-main>
<div class="container-fluid p-5 bg-main bg-gradient shadow mb-4">
<div class="row j">
    <div class="col-12 p-5">
        <h1 class="display-4 fw-normal text-light">Tutti i nostri annunci</h1>
    </div>
    <div class="col-12 col-md-10 d-flex flex-wrap">
        <div class="form-floating col-12 col-md-12 mb-3 me-3">                               
            <select id="SelectCategory" class="form-select" name=""  aria-label="seleziona un'opzione">
                                        
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach 
            </select>                           
                <label>Seleziona Categoria</label>
        </div>                    
        </div>
        <div class="col-12 col-md-2">
            <button id="submit-btn" class="btn btn-lg btn-dark">Cerca</button>
        </div>
</div>
</div>
<div class="container px-5 my-5">
    <div class="row gx-5">
         @foreach ($announcements as $announcement)
            <x-card :data="$announcement"/>
        @endforeach
        {{$announcements->links()}}
    </div>
</div>
</x-main>


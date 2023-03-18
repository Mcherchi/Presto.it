<x-main>
<div class="container-fluid p-5 bg-main bg-gradient shadow mb-4">
      <div class="row">
            <div class="col-12 p-5 text-center">
                  <h1 class="display-4 fw-normal text-light">{{__('ui.explore')}} {{$category->name}}</h1>
            </div>
            <div class="col-8 mx-auto">
                  <x-searchBar :datas="$categories"/>
            </div>    
      </div>
</div>

<div class="container px-5 my-5">
      <div class="row gx-5">  
        @if ($announcements->count() > 0) 
            @foreach ($announcements as $announcement)
                   <x-card :data="$announcement"/> 
            @endforeach
       @else
            <div class="container ">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center m-auto mt-5 shadow">
                <p class="h3">{{__('ui.noAnn')}}</p>
                <p><span class="h5">{{__('ui.uCreate')}}</span> <a href="{{ route('announcements.create') }}" class="btn-main text-decoration-none c-black px-3 py-1 ms-2">{{__('ui.createAnn')}}</a> </p>
                </div>
            </div>
            </div>
        @endif
      </div>
</div>
</x-main>

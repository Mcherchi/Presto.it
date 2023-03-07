<x-main>
<div class="container-fluid p-5 bg-main bg-gradient shadow mb-4">
<div class="row">
    <div class="col-12 p-5 text-center">
        <h1 class="display-4 fw-normal text-light">{{__('ui.allAnnouncements')}}</h1>
    </div>
    <div class="col-8 mx-auto">
         <x-searchBar :datas="$categories"/>
    </div>     
</div>
</div>
<div class="container px-5 my-5">
    <div class="row gx-5">
         @forelse ($announcements as $announcement)
            <x-card :data="$announcement"/>
        @empty
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center m-auto mt-5 shadow">
                <p class="h3">Non sono presenti annunci per questa ricerca! Prova a cambiare</p>
                </div>
            </div>
        </div>
        @endforelse
        {{$announcements->links()}}
    </div>
</div>
</x-main>


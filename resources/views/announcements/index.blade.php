<x-main>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Tutti gli annunci</h1>
            </div>
        </div>
    </div>
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach ($announcements as $announcement)
                       <x-card :data="$announcement"/>
                    @endforeach
                    {{$announcements->links()}}
                </div>
            </div>
        </div>
    </div>
</x-main>
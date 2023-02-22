<x-main>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Esplora la categoria {{ $category->name }}</h1>
            </div>
        </div>
    </div>
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($category->announcements as $announcement)
                        < <x-card :data="$announcement"/>
                    @empty
                        <div class="col-12">
                            <p class="h1"> Non sono presenti annunci per questa categoria!</p>
                            <p class="h3">Per publicarne uno clicca qui: <a href="{{ route('announcements.create') }}" class="btn btn-success shadow">Nuovo annuncio</a></p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-main>


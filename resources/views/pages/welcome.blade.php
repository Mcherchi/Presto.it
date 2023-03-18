<x-main>
    <div class="container mt-5">
      <div class="row align-items-center">
            <div class="col-6">
                  <img class="img-fluid" src="http://picsum.photos/1000/500" alt="">
            </div>
            <div class="col-6">
                  <h2 class="display-5 fw-semibold mt-4">{{__('ui.welcomeTo')}}<span class="c-main"> Presto.it</span>!</h2>
                  <p>
                   <strong>{{__('ui.letsBegin')}}!</strong> {{__('ui.wdywd')}}
                  </p>
                  <a class="btn btn-main me-2 px-4 py-2" href="{{route('homepage')}}">Home</a>
                  <a class="btn btn-outline px-4 py-2" href="{{route('announcements.create')}}">{{__('ui.createAnn')}}</a>
                  <a class="btn btn-outline ms-2 px-4 py-2" href="{{route('announcements.index')}}">{{__('ui.allAnn')}}</a>
            </div>
      </div>
    </div>
</x-main>

<div class="container ajax-container">
  <h2 class="text-6 fw-600 text-center mb-4">{{$project->title}}</h2>
  <div class="row g-4">
    <div class="col-md-7">
         {{-- <img class="img-fluid" alt="" src="{{ $project->image ? asset('images/'.$project->image) : defaultImage('no_image') }}"> --}}
         <img class="img-fluid" alt="" src="{{ file_exists(public_path('images/'.$project->image)) ? asset('images/' . $project->image) : defaultImage($project->image) }}">

        </div>
    <div class="col-md-5">
        {!! $project->details !!}

    </div>
  </div>
</div>

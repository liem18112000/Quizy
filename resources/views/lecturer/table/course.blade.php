@extends('layouts.lecturer')

@section('content')

<div class="text-center">
<h1>Course List</h1>
</div>


<div class="row">
@foreach($courses as $course)
<div class="col-lg-3 col-md-3 mb-3">
  <div class="card h-100">
    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="{{route('exam.index', $course)}}">{{$course->name}}</a>
      </h4>
      <p class="card-text">UID: {{$course->id}}</p>
      <p class="card-text">Date Created: {{$course->cresated_date}}</p>
      <p class="card-text">Lecture:</p>
    </div>
    <div class="card-footer">
    <div class="text-center">
      <button class="btn btn-info">Enroll</button>
      </div>
    </div>
  </div>
</div>
@endforeach



</div>
<!-- /.row -->
            


</div>

@endsection




@extends('layouts.lecturer')

@section('styles')
<script src="https://cdn.tiny.cloud/1/rmdclr9q9pr72tgrpg0w7x3r0kqnglgojdaxfqsij86e4bp0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')

<div class='container-fluid' style="padding-top:0;">

    <div class='row'>
        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rank
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Diamond</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Level
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">129</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href='{{route('lecturer.course')}}' class="text-xs font-weight-bold text-info text-uppercase mb-1">Courses Teached</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Comming soon</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href='#' data-toggle="modal" data-target="#modelId">
                                Request Created
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Request Create</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Course register</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Course reject</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Others</a>
                                                </li>
                                            </ul>

                                            <hr/>

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <form method="POST" action="{{ route('lecturer.request')}}" enctype="multipart/form-data">
                                                    @csrf
                                                        <div class="form-group">
                                                            <label for="">Select Course</label>
                                                            <select class="form-control" name="data" id="">
                                                                @foreach($courses as $course)
                                                                <option value='{{ $course->id }}'> {{ $course->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input type='hidden' name='request_type_id' value='1'>
                                                        <div class="form-group">
                                                            <label for="title">Description : </label>
                                                            <textarea rows='16' name='content'>
                                                            </textarea>
                                                            <script>
                                                                tinymce.init({
                                                                    selector: 'textarea',
                                                                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                                                    toolbar_mode: 'floating',
                                                                });
                                                            </script>
                                                        </div>
                                                        <hr/>

                                                        <div class='row'>
                                                            <div class='col-6'>
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                                                            </div>
                                                            <div class='col-6'>
                                                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                    <form method="POST" action="{{ route('lecturer.request')}}" enctype="multipart/form-data">
                                                    @csrf
                                                        <input type='hidden' name='request_type_id' value='2'>
                                                        <div class="form-group">
                                                            <label for="">Select Course</label>
                                                            <select class="form-control" name="data" id="">
                                                                @foreach($teachCourses as $teachCourse)
                                                                <option value='{{ $teachCourse->forCourse->id }}'> {{ $teachCourse->forCourse->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title">Description : </label>
                                                            <textarea rows='16' name='content'>
                                                            </textarea>
                                                            <script>
                                                                tinymce.init({
                                                                    selector: 'textarea',
                                                                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                                                    toolbar_mode: 'floating',
                                                                });
                                                            </script>
                                                        </div>
                                                        <hr/>

                                                        <div class='row'>
                                                            <div class='col-6'>
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                                                            </div>
                                                            <div class='col-6'>
                                                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                    <form method="POST" action="{{ route('lecturer.request')}}" enctype="multipart/form-data">
                                                    @csrf
                                                        <input type='hidden' name='request_type_id' value='3'>
                                                        <div class="form-group">
                                                            <label for="title">Description : </label>
                                                            <textarea rows='16' name='content'>
                                                            </textarea>
                                                            <script>
                                                                tinymce.init({
                                                                    selector: 'textarea',
                                                                    plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                                                    toolbar_mode: 'floating',
                                                                });
                                                            </script>
                                                        </div>
                                                        <hr/>

                                                        <div class='row'>
                                                            <div class='col-6'>
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                                                            </div>
                                                            <div class='col-6'>
                                                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">Comming soon</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class='row'>
        <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4'>
            <div class='card'>
                <div class='card-header'>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Header</div>
                </div>
                <div class='card-body'>
                    <div id="chartContainer1" style="height: 40vh; width: 100%;"></div>
                </div>
                <div class='card-footer text-center' style='padding: 2px'>
                    <a class="btn btn-outline-primary btn-block btn-sm" href="#" role="button">Learn more</a>
                </div>
            </div>

        </div>
        <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4'>
            <div class='card'>
                <div class='card-header'>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Header</div>
                </div>
                <div class='card-body'>
                    <div id="chartContainer2" style="height: 40vh; width: 100%;"></div>
                </div>
                <div class='card-footer text-center' style='padding: 2px'>
                    <a class="btn btn-outline-primary btn-block btn-sm" href="#" role="button">Learn more</a>
                </div>
            </div>

        </div>
    </div>

     <div class='row'>
        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href='#' class="text-xs font-weight-bold text-primary text-uppercase mb-1">Student
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Comming soon</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href='{{route('course.index')}}' class="text-xs font-weight-bold text-success text-uppercase mb-1">All Courses
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Comming soon</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-code fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href='#' class="text-xs font-weight-bold text-info text-uppercase mb-1">Export Report</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Not Available</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Categories
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Comming soon</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coffee fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>




@endsection

@section('scripts')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2",
	// title:{
	// 	text: "Simple Line Chart"
	// },
	axisY:{
		includeZero: false
	},
	data: [{
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: [
			{ y: 450 },
			{ y: 414},
			{ y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
			{ y: 460 },
			{ y: 450 },
			{ y: 500 },
			{ y: 480 },
			{ y: 480 },
			{ y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
			{ y: 500 },
			{ y: 480 },
			{ y: 510 }
		]
	}]
});
chart1.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	// title:{
	// 	text: "Email Categories",
	// 	horizontalAlign: "center"
	// },
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: 67, label: "Inbox" },
			{ y: 28, label: "Archives" },
			{ y: 10, label: "Labels" },
			{ y: 7, label: "Drafts"},
			{ y: 15, label: "Trash"},
			{ y: 6, label: "Spam"}
		]
	}]
});
chart2.render();

}
</script>
@endsection

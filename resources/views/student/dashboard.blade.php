@extends('layouts.student')

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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">69</div>
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
                            <a href='{{route('student.course')}}' class="text-xs font-weight-bold text-info text-uppercase mb-1">Enrolled Courses</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$enrollCourses->count()}} courses
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$courses->count()}} courses
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-code fa-2x text-gray-300"></i>
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
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Recent exam results</div>
                </div>
                <div class='card-body'>
                    <div id="chartContainer1" style="height: 45vh; width: 100%;"></div>
                </div>
            </div>

        </div>
        <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4'>
            <div class='card'>
                <div class='card-header'>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All exam results proportion</div>
                </div>
                <div class='card-body'>
                    <div id="chartContainer2" style="height: 45vh; width: 100%;"></div>
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
                            <a href='#' class="text-xs font-weight-bold text-primary text-uppercase mb-1">Classmates
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
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href='{{route('student.result')}}'>Exams Taken
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$exams->count()}} exams</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
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
                            <a href='#' class="text-xs font-weight-bold text-info text-uppercase mb-1">Quizy Assistant</a>
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
                            <a class="text-xs font-weight-bold text-warning text-uppercase mb-1"  data-toggle="modal" data-target="#exampleModal">
                                Request
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{Auth::user()->requests->count()}} requests</div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Student Requests</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if(Auth::user()->roles->count() >= 2)
                                                <a class="btn btn-warning btn-block inactive" role="button">Your account has been upgraded</a>
                                            @elseif(Auth::user()->requests->where('request_type_id', '3')->where('user_id', Auth::user()->id)->where('request_status', 'pending')->first())
                                                <a class="btn btn-warning btn-block inactive" role="button">Your requests is pending</a>
                                            @else
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modelId">
                                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                                Upgrade your account
                                            </button>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <form method="POST" action="{{ route('student.request')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title text-center">Account Upgrade</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class='col-12'>
                                                        <div class="form-group">
                                                            <label for="title">Name</label>
                                                            <input type="text" name="title" id="title" class="form-control" value='{{Auth::user()->name}}' disabled="disabled">
                                                        </div>
                                                    </div>

                                                    <div class='col-12'>
                                                        <div class="form-group">
                                                            <label for="time">Email</label>
                                                            <input type="email" name="allow_time" id="time" class="form-control" value='{{Auth::user()->email}}' disabled='disabled'>
                                                        </div>
                                                    </div>

                                                    <div class='col-12'>
                                                        <div class="form-group">
                                                            <label for="time">Roles</label><br/>
                                                            @foreach(Auth::user()->roles as $role)
                                                                <a name="" id="" class="btn btn-dark btn-block" href="#" role="button" disabled='disabled'>{{$role->roleType->name}}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <input type="hidden" value='3' name='request_type_id'>

                                                    <input type="hidden" value='2' name='data'>

                                                    <div class="col-12">
                                                        <label for="bio">
                                                            Explain why you need to upgrade
                                                        </label>
                                                        <textarea id='bio' rows='32' name='bio' style='height:100%'>

                                                        </textarea>
                                                        <script>
                                                            tinymce.init({
                                                                selector: 'textarea',
                                                                plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                                                toolbar_mode: 'floating',
                                                            });
                                                        </script>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <div class="container-fluid">
                                                        <div class='row'>
                                                            <div class='col-6'>
                                                                <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                                                            </div>
                                                            <div class='col-6'>
                                                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
	axisY: {
		title: "Overall grade",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		title: "Remain time in seconds",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Exam Grade",
		dataPoints:[
        @foreach($doing_exams as $result)
            { label: "{{$result->exam->title}}", y: {{$result->grade}} },
        @endforeach
		]
	},
	{
		type: "column",
		name: "Exam Remain Time",
		// legendText: "Oil Production",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
        @foreach($doing_exams as $result)
            { label: "{{$result->exam->title}}", y: {{$result->remain_time}} },
        @endforeach
		]
	}]
});
chart1.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart1.render();
}


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
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: {{$grades[0]}}, label: "Below 10/40" },
			{ y: {{$grades[1]}}, label: "10/40 - 20/40" },
			{ y: {{$grades[2]}}, label: "20/40 - 30/40" },
			{ y: {{$grades[3]}}, label: "Above 30/40"},
		]
	}]
});
chart2.render();

}
</script>
@endsection

@extends('layouts.admin')

@section('content')
<div class='container-fluid' style="padding-top:0;">

    <div class='row'>
        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
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
                            <a href='{{route('admin.course')}}' class="text-xs font-weight-bold text-info text-uppercase mb-1">Courses (Overall)</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberOfCourses}}</div>
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
                            <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href='#'>Exams
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberOfExams}}</div>
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
                            <a href='{{route('admin.user')}}' class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberOfUsers}}</div>
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
                            <a href='#' class="text-xs font-weight-bold text-success text-uppercase mb-1">Lecturers
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberOfLecturers}}</div>
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
                            <a href='#' class="text-xs font-weight-bold text-info text-uppercase mb-1">Admin</a>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberOfAdmins}}</div>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <a href="{{ route('admin.request.index')}}" role="button">
                                    Pending Requests
                                </a>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$requests->where('request_status', 'pending')->count()}}</div>
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

@extends('layouts.lecturer')

@section('content')


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

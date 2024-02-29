<?php
 
$dataPoints = array( 
	array("y" => 7,"label" => "2 bed 1 bath" ),
	array("y" => 12,"label" => "2 bed 2 bath" ),
	array("y" => 28,"label" => "3 bed 2 bath" ),
	array("y" => 35,"label" => "4 bed 3 bath" ),
	array("y" => 41,"label" => "3 bed 3 bath" )
);

$dataPoints2 = array( 
	array("y" => 10,"label" => "December" ),
	array("y" => 14,"label" => "November" ),
	array("y" => 24,"label" => "October" ),
	array("y" => 35,"label" => "March" ),
	array("y" => 50,"label" => "Feburary" )
);

$dataPoints3 = array( 
    array("y" => 15,"label" => "Mableton" ),
	array("y" => 30,"label" => "Savannah" ),
	array("y" => 35,"label" => "Marietta" ),
    array("y" => 43,"label" => "Atlanta" ),
);

$dataPoints4 = array( 
    array("y" => 13,"label" => "200-300 k" ),
	array("y" => 55,"label" => "300-400 k" ),
	array("y" => 39,"label" => "400-500 k" ),
    array("y" => 9,"label" => "500-600 k" ),
    array("y" => 7,"label" => ">600 k" ),
);

$dataPoints5 = array( 
	array("y" => 134,"label" => "November" ),
	array("y" => 34, "label" => "December" ),
	array("y" => 345,"label" => "January" ),
	array("y" => 435,"label" => "Feburary" ),
	array("y" => 456,"label" => "March" )
);

$dataPoints6 = array( 
	array("y" => 16,"label" => "3 bed 3 bath" ),
	array("y" => 13,"label" => "4 bed 3 bath"),
	array("y" => 4,"label" => "3 bed 2 bath" ),
	array("y" => 6,"label" => "4 bed 3 bath" ),
	array("y" => 3,"label" => "3 bed 3 bath" )
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
    <!-- <style>
        body{
            height:1200px;
        }
    </style> -->

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Houses Sold"
	},
	axisY: {
		title: "Sold House Numbers",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0 houses",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	title:{
		text: "Houses Sold"
	},
	axisY: {
		title: "Sold House Numbers",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0 houses",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	title:{
		text: "Houses Sold"
	},
	axisY: {
		title: "Sold House Numbers",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0 houses",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();

var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	title:{
		text: "Houses Sold"
	},
	axisY: {
		title: "Sold House Numbers",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0 houses",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();

var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	title:{
		text: "Active Buyers"
	},
	axisY: {
		title: "Buyer Numbers",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0 buyers",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
	}]
});
chart5.render();

var chart6 = new CanvasJS.Chart("chartContainer6", {
	animationEnabled: true,
	title:{
		text: "On Sale Houses"
	},
	axisY: {
		title: "On Sale House Numbers",
		includeZero: true,
		prefix: "",
		suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0 houses",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
	}]
});
chart6.render();
}
</script>
<link rel="stylesheet" href="./styles/admin.css">
</head>
<body>
    <div class="head"><h1> Hi, Admin! </h1></div>
	<a href="logout.php">
		<button id="button">Logout</button>
	</a>
    <!-- <h2>Check buyer views!</h2> -->
    <!-- <a href='buyer.php'> Check buyer view </a> -->
    <h2>Check status below</h2>
<div id="chartContainer5" class="chartContainer" style="height: 270px; width: 40%;display:inline-block;"></div>
<div id="chartContainer6" class="chartContainer" style="height: 270px; width: 40%;margin-left:5%;display:inline-block;"></div>
<div id="chartContainer" class="chartContainer" style="height: 270px; width: 40%;display:inline-block;"></div>
<div id="chartContainer2" class="chartContainer" style="height: 270px; width: 40%;margin-left:5%;display:inline-block;"></div>
<div id="chartContainer3" class="chartContainer" style="height: 270px; width: 40%;display:inline-block;"></div>
<div id="chartContainer4" class="chartContainer" style="height: 270px; width: 40%;margin-left:5%;display:inline-block;"></div>

<script src="canvasjs.min.js"></script>
</body>
</html> 
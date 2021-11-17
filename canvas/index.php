<head>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",{
		title:{
			text:"Grafik Kecepatan Motor"
		},
		data: [{
			type: "line",
			dataPoints : [],
		}]
	});
		
	$.getJSON("service.php", function(data) {  
		$.each((data), function(key, value){
			chart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
		});
		chart.render();
		updateChart();
	});

	function updateChart() {
		$.getJSON("service.php", function(data) {		
			chart.options.data[0].dataPoints = [];
			$.each((data), function(key, value){
				chart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
			});
			
			chart.render();
		});
	}
	
	setInterval(function(){updateChart()}, 1000);
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 360px; width: 100%;"></div>
</body>
</html>
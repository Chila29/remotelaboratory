window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer",{
		title:{
			text:"Monitor Kecepatan Motor",
		},
		data: [{
			type: "line",
			dataPoints : [],
		}]
	});
	// var canvas = document.getElementById("myChart");
    //         var ctx = canvas.getContext("2d");
    //         var myChart = new Chart(ctx, {
    //             type: 'line',
    //             data: {
    //                 datasets: [{
    //                         label: "Tegangan masuk",
    //                         data: [<?php echo $Vin ?>],

    //                         borderColor: [
    //                         '#4747A1',
    //                         ],
    //                         borderWidth: 1,
    //                         fill: false
    //                     },
    //                     {
    //                         label: "Tegangan keluar",
    //                         data: [<?php echo $Vout ?>],

    //                         borderColor: [
    //                         '#E02401',
    //                         ],
    //                         borderWidth: 1,
    //                         fill: false
    //                     }
    //                 ]
    //             },
    //             options: {
    //                 scales: {
    //                     yAxes: [{
    //                             ticks: {
    //                                 beginAtZero: true
    //                             }
    //                         }]
    //                 }
    //             }
    //         });
		
	$.getJSON("../data/service.php", function(data) {  
		$.each((data), function(key, value){
			chart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
		});
		chart.render();
		updateChart();
	});

	function updateChart() {
		$.getJSON("../data/service.php", function(data) {		
			chart.options.data[0].dataPoints = [];
			$.each((data), function(key, value){
				chart.options.data[0].dataPoints.push({label: value[0], y: parseInt(value[1])});
			});
			
			chart.render();
		});
	}
	
	setInterval(function(){updateChart()}, 1000);
}
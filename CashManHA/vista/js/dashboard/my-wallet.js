(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	var activityBar = function(){
		var activity = document.getElementById("activity");
		if (activity !== null) {
			var activityData = [{
				first: [350, 180, 150, 350, 400, 200, 300, 250, 220, 200, 250, 350, 350, 180, 150, 350, 400, 200, 300, 250, 220, 200, 250, 350, 300, 250, 220, 200, 250, 350]
			}];
			activity.height = 320;
			
			var config = {
				type: "bar",
				data: {
					labels: [
						"06",
						"07",
						"08",
						"09",
						"10",
						"11",
						"12",
						"13",
						"14",
						"15",
						"16",
						"17",
						"18",
					],
					datasets: [
						{
							label: "My First dataset",
							data:  [350, 180, 150, 350, 400, 200, 300, 250, 220, 200, 250, 350, 350, 180, 150, 350, 400, 200, 300, 250, 220, 200, 250, 350, 300, 250, 220, 200, 250, 350],
							borderColor: 'rgba(47, 76, 221, 0)',
							borderWidth: "0",
							barThickness:'flex',
							backgroundColor: '#6418C3',
							minBarLength:10
						}
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								color: "rgba(233,236,255,1)",
								drawBorder: true
							},
							ticks: {
								fontColor: "#3e4954",
								 max: 600,
                min: 0,
                stepSize: 200
							},
						}],
						xAxes: [{
							barPercentage: 0.3,
							
							gridLines: {
								display: false,
								zeroLineColor: "transparent"
							},
							ticks: {
								stepSize: 200,
								fontColor: "#3e4954",
								fontFamily: "Nunito, sans-serif"
							}
						}]
					},
					tooltips: {
						mode: "index",
						intersect: false,
						titleFontColor: "#888",
						bodyFontColor: "#555",
						titleFontSize: 14,
						bodyFontSize: 15,
						backgroundColor: "rgba(255,255,255,1)",
						displayColors: true,
						xPadding: 10,
						yPadding: 7,
						borderColor: "rgba(220, 220, 220, 1)",
						borderWidth: 0,
						caretSize: 6,
						caretPadding: 10
					}
				}
			};

			var ctx = document.getElementById("activity").getContext("2d");
			var myLine = new Chart(ctx, config);

			var items = document.querySelectorAll("#user-activity .nav-tabs .nav-item");
			items.forEach(function(item, index) {
				item.addEventListener("click", function() {
					config.data.datasets[0].data = activityData[index].first;
					myLine.update();
				});
			});
		}
	}
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){	
				activityBar();		
			},
			
			resize:function(){
				
			}
		}
	
	}();
	jQuery(document).ready(function(){
	});
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

	jQuery(window).on('resize',function(){
		
		
	});     

})(jQuery);
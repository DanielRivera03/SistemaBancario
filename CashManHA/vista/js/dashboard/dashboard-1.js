(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	var donutChart = function(){
		$("span.donut").peity("donut", {
			width: "80",
			height: "80"
		});
	}
	
	var activityBar = function(){
		var activity = document.getElementById("activityLine");
		var inputs = {
			min: 20,
			max: 80,
			count: 8,
			decimals: 2,
			continuity: 1
		};
		if (activity !== null) {
			var activityData = [{
					first: [50, 75, 34, 55, 25, 70, 30, 80, 30, 90, 25, 65]
				},
				{
					first: [50, 35, 10, 45, 40, 50, 60, 35, 10, 70, 34, 35]
				},
				{
					first: [20, 35, 70, 45, 40, 35, 30, 35, 10, 40, 60, 20]
				}
			];
			
			activity.height = 350;
			
			var config = {
				type: "line",
				data: {
					labels: [
						"Jan",
						"Feb",
						"Mar",
						"Apr",
						"May",
						"Jun",
						"Jul",
						"Aug",
						"Sep",
						"Oct",
						"Nov",
						"Dec",
					],
					datasets: [
						{
							label: "My First dataset",
							data:  [50, 75, 34, 55, 25, 70, 50, 80, 60, 90, 45, 65],
							borderColor: '#ffab2d',
							borderWidth: "4",
							barThickness:'flex',
							backgroundColor: 'rgba(255, 171, 45, 0.05)',
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
							 gridColor: "navy",
							gridLines: {
								color: "rgba(0,0,0,0.1)",
								height: 50,
								drawBorder: true
							},
							ticks: {
								fontColor: "#3e4954",
								max: 100,
								min: 0,
								stepSize: 20
							},
						}],
						xAxes: [{
							barPercentage: 0.3,
							
							gridLines: {
								display: false,
								zeroLineColor: "transparent"
							},
							ticks: {
								stepSize: 20,
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
						titleFontSize: 12,
						bodyFontSize: 15,
						backgroundColor: "rgba(255,255,255,1)",
						displayColors: true,
						xPadding: 10,
						yPadding: 7,
						borderColor: "rgba(220, 220, 220, 1)",
						borderWidth: 1,
						caretSize: 6,
						caretPadding: 10
					}
				}
			};

			var ctx = document.getElementById("activityLine").getContext("2d");
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
	
	
	var widgetChart1 = function(){
		if(jQuery('#widgetChart1').length > 0 ){
			const chart_widget_1 = document.getElementById("widgetChart1").getContext('2d');

			new Chart(chart_widget_1, {
				type: "line",
				data: {
					labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April"],
					datasets: [{
						label: "Sales Stats",
						backgroundColor: ['rgba(234, 73, 137, 0)'],
						borderColor: '#ffab2d',
						pointBackgroundColor: '#ffab2d',
						pointBorderColor: '#ffab2d',
						borderWidth:2,
						pointHoverBackgroundColor: '#ffab2d',
						pointHoverBorderColor: '#ffab2d',
						data: [8, 7, 6, 3, 2, 4, 6, 8, 12, 6, 12, 13, 10, 18, 14, 24, 16, 12, 19, 21, 16, 14, 24, 21, 13, 15, 27, 29, 21, 11, 14, 19, 21, 17]
					}]
				},
				options: {
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						xAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						}],
						yAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}]
					},
					elements: {
						line: {
							tension: .15
						},
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});

		}
	}
	
	var widgetChart2 = function(){
		if(jQuery('#widgetChart2').length > 0 ){
			const chart_widget_2 = document.getElementById("widgetChart2").getContext('2d');

			new Chart(chart_widget_2, {
				type: "line",
				data: {
					labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April"],
					datasets: [{
						label: "Sales Stats",
						backgroundColor: ['rgba(234, 73, 137, 0)'],
						borderColor: '#DC3CCC',
						pointBackgroundColor: '#DC3CCC',
						pointBorderColor: '#DC3CCC',
						borderWidth:2,
						pointHoverBackgroundColor: '#DC3CCC',
						pointHoverBorderColor: '#DC3CCC',
						data: [19, 21, 16, 14, 24, 21, 13, 15, 27, 29, 21, 11, 14, 19, 21, 17, 12, 6, 12, 13, 10, 18, 14, 24, 16, 12, 8, 7, 6, 3, 2, 7, 6, 8]
					}]
				},
				options: {
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						xAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						}],
						yAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}]
					},
					elements: {
						line: {
							tension: .15
						},
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});

		}
	}
	var widgetChart3 = function(){
		if(jQuery('#widgetChart3').length > 0 ){
			const chart_widget_3 = document.getElementById("widgetChart3").getContext('2d');

			new Chart(chart_widget_3, {
				type: "line",
				data: {
					labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April"],
					datasets: [{
						label: "Sales Stats",
						backgroundColor: ['rgba(234, 73, 137, 0)'],
						borderColor: '#2B98D6',
						pointBackgroundColor: '#2B98D6',
						pointBorderColor: '#2B98D6',
						borderWidth:2,
						pointHoverBackgroundColor: '#2B98D6',
						pointHoverBorderColor: '#2B98D6',
						data: [8, 7, 6, 3, 2, 4, 6, 8, 10, 6, 12, 15, 13, 15, 14, 13, 21, 11, 14, 10, 21, 10, 13, 10, 12, 14, 16, 14, 12, 10, 9, 8, 4, 1]
					}]
				},
				options: {
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						xAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						}],
						yAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}]
					},
					elements: {
						line: {
							tension: .15
						},
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});

		}
	}
	var widgetChart4 = function(){
		if(jQuery('#widgetChart4').length > 0 ){
			const chart_widget_4 = document.getElementById("widgetChart4").getContext('2d');

			new Chart(chart_widget_4, {
				type: "line",
				data: {
					labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "January", "February", "March", "April"],
					datasets: [{
						label: "Sales Stats",
						backgroundColor: ['rgba(234, 73, 137, 0'],
						borderColor: '#5F5F5F',
						pointBackgroundColor: '#5F5F5F',
						pointBorderColor: '#5F5F5F',
						borderWidth:2,
						pointHoverBackgroundColor: '#5F5F5F',
						pointHoverBorderColor: '#5F5F5F',
						data: [20, 18, 16, 12, 8, 10, 13, 15, 12, 6, 12, 13, 10, 18, 14, 16, 17, 15, 19, 16, 16, 14, 18, 21, 13, 15, 18, 17, 21, 11, 14, 19, 21, 17]
					}]
				},
				options: {
					title: {
						display: !1
					},
					tooltips: {
						intersect: !1,
						mode: "nearest",
						xPadding: 10,
						yPadding: 10,
						caretPadding: 10
					},
					legend: {
						display: !1
					},
					responsive: !0,
					maintainAspectRatio: !1,
					hover: {
						mode: "index"
					},
					scales: {
						xAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Month"
							}
						}],
						yAxes: [{
							display: !1,
							gridLines: !1,
							scaleLabel: {
								display: !0,
								labelString: "Value"
							},
							ticks: {
								beginAtZero: !0
							}
						}]
					},
					elements: {
						line: {
							tension: .15
						},
						point: {
							radius: 0,
							borderWidth: 0
						}
					},
					layout: {
						padding: {
							left: 0,
							right: 0,
							top: 5,
							bottom: 0
						}
					}
				}
			});

		}
	}
	
	
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				donutChart();
				widgetChart1();	
				widgetChart2();	
				widgetChart3();	
				widgetChart4();		
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
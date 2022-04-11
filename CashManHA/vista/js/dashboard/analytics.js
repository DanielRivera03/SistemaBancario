(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
	var chartBar = function(){
		
		var options = {
			  series: [
				{
					name: 'Net Profit',
					data: [50, 70, 40, 80, 30, 60, 100],
					//radius: 12,	
				}, 				
			],
				chart: {
				type: 'area',
				height: 350,
				toolbar: {
					show: false,
				},
				
			},
			plotOptions: {
			  bar: {
				horizontal: false,
				columnWidth: '55%',
				endingShape: 'rounded'
			  },
			},
			colors:['#2f4cdd'],
			dataLabels: {
			  enabled: false,
			},
			markers: {
		shape: "circle",
		},
		
		
			legend: {
				show: false,
			},
			stroke: {
			  show: true,
			  width: 4,
			  colors:['#2f4cdd'],
			},
			
			grid: {
				borderColor: '#eee',
			},
			xaxis: {
				
			  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July'],
			  labels: {
				style: {
					colors: '#3e4954',
					fontSize: '13px',
					fontFamily: 'Poppins',
					fontWeight: 100,
					cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
			  show: false,
			  }
			},
			yaxis: {
				labels: {
			   style: {
				  colors: '#3e4954',
				  fontSize: '13px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
			  },
			  },
			},
			fill: {
			  opacity: 1
			},
			tooltip: {
			  y: {
				formatter: function (val) {
				  return "$ " + val + " thousands"
				}
			  }
			}
			};

			var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
			chartBar1.render();
	}
	
	var counterBar = function(){
		$(".counter").counterUp({
			delay: 30,
			time: 3000
		});
	}
	var peitySuccess = function(){
		$(".peity-success").peity("line", {
			fill: ["rgba(48, 194, 89, .2)"], 
			stroke: '#30c259', 
			strokeWidth: '3', 
			width: "47",
			height: "30"
		});
	}
	var peityDanger = function(){
		$(".peity-danger").peity("line", {
			fill: ["rgba(248, 79, 78, .2)"], 
			stroke: '#f84f4e', 
			strokeWidth: '3', 
			width: "47",
			height: "30"
		});
	}
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				chartBar();
				counterBar();
				peitySuccess();
				peityDanger();
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
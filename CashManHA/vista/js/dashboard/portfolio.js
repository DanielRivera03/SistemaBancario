(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	var chartCircle = function(){
		
		
		var optionsCircle = {
		  chart: {
			type: 'radialBar',
			//width:320,
			height: 320,
			offsetY: 0,
			offsetX: 0,
			
		  },
		  plotOptions: {
			radialBar: {
			  size: undefined,
			  inverseOrder: false,
			  hollow: {
				margin: 0,
				size: '35%',
				background: 'transparent',
			  },
			  
			  
			  
			  track: {
				show: true,
				background: '#e1e5ff',
				strokeWidth: '10%',
				opacity: 1,
				margin: 10, // margin is in pixels
			  },


			},
		  },
		  responsive: [{
          breakpoint: 480,
          options: {
			chart: {
			offsetY: 0,
			offsetX: 0
		  },	
            legend: {
              position: 'bottom',
              offsetX:0,
              offsetY: 0
            }
          }
        }],
		
		fill: {
          opacity: 1
        },
		
		colors:['#6418C3', '#9859E7', '#E1CAFF'],
		series: [75, 65, 50],
		labels: ['New', 'Recover', 'In Treatment'],
		legend: {
			fontSize: '16px',  
			show: false,
		  },		 
		}

		var chartCircle1 = new ApexCharts(document.querySelector('#chartCircle'), optionsCircle);
		chartCircle1.render();
		
	}
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){	
				chartCircle();		
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
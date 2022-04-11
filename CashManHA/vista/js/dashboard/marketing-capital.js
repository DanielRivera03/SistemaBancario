(function($) {
    /* "use strict" */


 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
		
	var peityLine = function(){
		$(".peity-line").peity("line", {
			fill: ["rgba(234, 73, 137, .0)"], 
			stroke: '#FFAB2D', 
			strokeWidth: '4', 
			width: "280",
			height: "50"
		});
	}
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){	
				peityLine();		
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
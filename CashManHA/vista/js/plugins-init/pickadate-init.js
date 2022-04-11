(function($) {
    "use strict"

    //date picker classic default
    
    $('.datepicker-default').pickadate({
        format: 'yyyy-mmmm-dd',
        min: '1940-01-01',
        max: '2003-12-31',
        formatSubmit: 'yyyy-mm-dd',
        hiddenPrefix: 'prefix__',
        hiddenSuffix: '__suffix',
        //selectYears: true,
        //selectMonths: true,
        //selectYears: 81,
        });
    

})(jQuery);
var ComponentsDateTimePickers = function () {

    var handleDatePickers = function () {

        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                orientation: "left",
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        }    
    }

    return {
        //main function to initiate the module
        init: function () {
            handleDatePickers();
        }
    };

}();

jQuery(document).ready(function() {    
    ComponentsDateTimePickers.init(); 
});
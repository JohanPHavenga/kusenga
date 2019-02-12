var ComponentsEditors = function () {
  
    var handleSummernote = function () {
        $('#news_content').summernote({height: 450});
    }

    return {
        //main function to initiate the module
        init: function () {
            handleSummernote();
        }
    };

}();

jQuery(document).ready(function() {    
   ComponentsEditors.init(); 
});
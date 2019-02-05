var TableDatatablesManaged = function () {
    
    var initUsersTable = function () {
        var table = $('#user_table');
        table.dataTable({
            order: [[0,"desc"]],
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [4] }, 
                { searchable: false, targets: [4] },
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 },
                { responsivePriority: 3, targets: 1 }
                
            ]
        });   
    };
    
    var initNewsTable = function () {
        var table = $('#news_table');
        table.dataTable({
            order: [[3,"desc"]],
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [4] }, 
                { searchable: false, targets: [4] },
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 },
                { responsivePriority: 3, targets: 1 },
                { responsivePriority: 4, targets: 3 }
                
            ]
        });   
    };

    return {
        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }
            initUsersTable();
            initNewsTable();
        }
    };

}();

//if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
//}
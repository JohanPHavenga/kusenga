var TableDatatablesManaged = function () {
    
    var initUsersTable = function () {
        var table = $('#users_table');
        table.dataTable({
            order: [[0,"desc"]],
            responsive: true,
            columnDefs: [
                { orderable: false, targets: [4] }, 
                { searchable: false, targets: [4] },
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 },
                { responsivePriority: 3, targets: 3 }
                
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
        }
    };

}();

//if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {
        TableDatatablesManaged.init();
    });
//}
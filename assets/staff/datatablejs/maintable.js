$(document).ready(function(){
    $("#table").DataTable({
        dom : 'Bfrtip',
        // select : true,
        buttons : [
            {
                extend : 'excel',
                text : 'excel',
                className : 'btn btn-success my-3 mx-2',
                exportOptions : {
                    columns : ':visible'
                }
            },
            {
                extend : 'pdf',
                text : 'PDF',
                className : 'btn btn-danger my-3 mx-2'
                ,
                exportOptions : {
                    columns : ':visible'
                }
            }  ,
            {
                extend : 'print',
                text : 'PRINT',
                className : 'btn btn-info my-3 mx-2',
                exportOptions : {
                    columns : [0,1,2,3]
                }
            } 
        ],
        // "order" : [[1,"asc"]]
    });
});


$(document).ready(function(){

    $('#data-table').DataTable({

        sDom:"tipr",
        responsive: true,
        "ajax": {
            "url": url,
            "dataSrc": ""
        },
        "language": {
            "searchPlaceholder": "Search records",
            "search": "",
        },
        "columns": [
            {
                "data": "Link",
                "render": function(data, type, row, meta){
                    if(type === 'display'){
                        data = '<a href="' + data + '" target="_blank">' + "Download"+ '</a>';
                    }

                    return data;
                }
            },
            {"data":"PaperName"},
            {"data":"CourseName"},
            {"data":"CourseCode"},
            {"data":"PaperYear"}

        ] ,
        "columnDefs": [
            {
                targets: -1,
                className: "stripe hover"
            }
        ]
    });
    var table = $('#data-table').DataTable();

    // #myInput is a <input type="text"> element
    $('#myInputTextField').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );
});

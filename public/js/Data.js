$(document).ready(function(){
    console.log("HEEEE;");  
    $('#data-table').DataTable({ 

       sDom:"tipr",
       responsive: true,
       "ajax": {
           "url": "Data.json",
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
           {"data":"Paper Name"},  
           {"data":"Course Name"},
           {"data":"Course Code"},  
           {"data":"Paper Year"} 
            
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
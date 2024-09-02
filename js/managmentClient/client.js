let tbl_casos;
var idioma_es = {
  select: {
  rows: "%d fila seleccionada"
  },
  "sProcessing":     "Procesando...",
  "sLengthMenu":     "Mostrar _MENU_ registros",
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
  "sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
  "sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "<b>No se encontraron datos</b>",
  "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
  },
  "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  }
}


function listCase(){
    tbl_casos = $("#tabla_casos").DataTable({
        "ordering":false,   
        "bLengthChange":true,
        "searching": { "regex": false },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            "url":"../crontroller/managmentClient/clientController.php",
            type:'POST',
            "data": {
                "listCase": "1"
            }
        },
        "columns":[

            {'defaultContent': ''},
            {'data': 'usuario'},
            {'data': 'empresa'},
            {'data': 'telefono'},
            {'data': 'estatus'},
            {'data': 'notas'},
            {'defaultContent': '<button id="editarEmpl" class="btn bg-gradient-primary"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M864-40 756-148q-22 13-46 20.5t-50 7.5q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 26-7.5 50T812-204L920-96l-56 56ZM660-200q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm180-360h-80v-200h-80v120H280v-120h-80v560h200v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg></button>'},
        ],
  
        "language":idioma_es,
        select: true
    });
    tbl_casos.on('draw.td',function(){
      var PageInfo = $("#tabla_casos").DataTable().page.info();
      tbl_casos.column(0, {page: 'current'}).nodes().each(function(cell, i){
        cell.innerHTML = i + 1 + PageInfo.start;
      });
    });
  
}
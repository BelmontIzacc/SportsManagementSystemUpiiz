/*var boton1 = document.getElementById("test");
boton1.disabled = true;	
*/

function authUser(title, variable){
    document.getElementById('windowTitle').innerHTML=title;
    document.getElementById("formButton").formAction = window.location.href+"/"+variable;
    document.getElementById("formButton").setAttribute('onclick', '');
    document.getElementById("formButton").setAttribute('type', 'submit');
    document.getElementById('specialPopUp').innerHTML = '';
    document.getElementById('clave').value = '';

}

function descargarExcell()
{
	ventana = window.open("/admin/ExportExcelAll","nuevo","width=500,height=100");
    setTimeout("cerrar()",2500);
}

function reset(title, variable){
    
    alerts(variable);
}

function alerts(opc){
    switch(opc){
        case 1:
            swal({
                title: "Reseteado",
                text: "Se ha Eliminado Los Registros.",
                type: "success",
                //confirmButtonClass: "btn-success"
                timer: 1500,
                showConfirmButton: false
            });
            eliminar();
        break;
        case 2:
            swal({
                title: "¡Error!",
                text: "No se pudo completar la operación.",
                type: "error",
                //confirmButtonClass: "btn-danger"
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout("recargar()",800); 
        break;
    }    
}

function eliminar()
{
	setTimeout("recargar()",800);
    ventana = window.open("/admin/eliminarAll","nuevo","width=20,height=10");
    setTimeout("cerrar()",800);
}

function recargar()
{
	window.location.reload();
}

function cerrar()
{
	ventana.close();
}

$(function() {    
    $('#date_box').datetimepicker({
        //format: 'YYYY-MM-DD',
        format: 'DD-MM-YYYY',
        locale: 'es',
        viewMode: 'years'
    });
    $('#date_box2').datetimepicker({
        format: 'DD-MM-YYYY',
        //format: 'YYYY-MM-DD',
        locale: 'es',
        viewMode: 'years'
    });
});
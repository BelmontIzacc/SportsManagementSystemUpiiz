

function verInfo(titulo,contenido,dia,mes,hora) {
	document.getElementById('lineTitle').innerHTML=titulo;
	document.getElementById('lineContent').innerHTML=contenido;
	document.getElementById('lineDate').innerHTML=dia+'<\br>';
	document.getElementById('lineDate').innerHTML=mes;
	document.getElementById('lineHour').innerHTML=hora;

	//alert(titulo+contenido+dia+mes+hora);
}

function editarInfo(Etitulo,Econtenido,id) {
	document.getElementById('editTitle').value=Etitulo;
	document.getElementById('editContent').value=Econtenido;
	document.getElementById('id_post').value=id;
	document.getElementById('id_delete').value=id;
	//alert(Etitulo+Econtenido);
}



function toggleInf(){
    $('.editTables').slideToggle(function(){$('#more').html($('.editTables').is(':visible')?'Ocultar':'Mostrar más');});
}

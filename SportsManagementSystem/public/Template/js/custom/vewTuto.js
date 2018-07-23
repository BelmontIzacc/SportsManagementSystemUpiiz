

function verTuto(titulo,link,imagen) {
	document.getElementById('tituloVi').innerHTML=titulo;
	document.getElementById('linkVi').innerHTML=imagen;

	//alert(titulo+link+imagen);
}

function editarTutor(EtituloT,ElinkT,EimagenT,id) {
	document.getElementById('eTituloTuto').value=EtituloT;
	document.getElementById('eContenidoTuto').value=ElinkT;
	document.getElementById('eContenidoTutoImg').value=EimagenT;
	document.getElementById('id_postTuto').value=id;
	document.getElementById('id_deleteTuto').value=id;
	//alert(EtituloT+ElinkT+EimagenT);
}



function toggleTuto(){
    $('.editTablesTuto').slideToggle(function(){$('#more').html($('.editTablesTuto').is(':visible')?'Ocultar':'Mostrar más');});
}

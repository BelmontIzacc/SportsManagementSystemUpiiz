

function verVid(titulo,link,imagen) {
	document.getElementById('tituloVi').innerHTML=titulo;
	document.getElementById('linkVi').innerHTML=imagen;

	//alert(titulo+link+imagen);
}

function editarVide(Etitulo,Elink,Eimagen,id) {
	document.getElementById('eTituloVid').value=Etitulo;
	document.getElementById('eContenidoVid').value=Elink;
	document.getElementById('eContenidoVidImg').value=Eimagen;
	document.getElementById('id_postVid').value=id;
	document.getElementById('id_deleteVid').value=id;
	//alert(Etitulo+Econtenido);
}



function toggle(){
    $('.editTablesVideo').slideToggle(function(){$('#more').html($('.editTablesVideo').is(':visible')?'Ocultar':'Mostrar más');});
}

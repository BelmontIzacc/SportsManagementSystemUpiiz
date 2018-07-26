function  updateInputs(title, name, variable, id){
    document.getElementById('windowTitle').innerHTML=title;
    document.getElementById('nombre').value = name;
    document.getElementById('idVal').value = id;
    document.getElementById('idVal2').value = id;
    document.getElementById("formButton").formAction = window.location.href; //variable
    document.getElementById("formButton2").formAction = window.location.href;
    
//         $("#estatus").val(status);
//     $("#estatus").change();
//     $("#documentacion").val(documentation);
//     $("#documentacion").change();
//     document.getElementById("formi").formAction = "/admin/lists/"+id;
}

function  updateInputs2(title, name, variable, id, place, number, mapa){
    document.getElementById('windowTitle').innerHTML=title;
    document.getElementById('nombre').value = name;
    document.getElementById('idVal').value = id;
    document.getElementById('idVal2').value = id;
    document.getElementById("formButton").formAction = window.location.href; //variable
    document.getElementById("formButton2").formAction = window.location.href;
    
    document.getElementById('numero2').value = number;
    $("#municipio2").val(place);
    $("#municipio2").change();
    
    document.getElementById('mapa').value = mapa;
//     $("#documentacion").val(documentation);
//     $("#documentacion").change();
//     document.getElementById("formi").formAction = "/admin/lists/"+id;
}

function  updateInputs3(title, name, variable, id, color){
    document.getElementById('windowTitle').innerHTML=title;
    document.getElementById('nombre').value = name;
    document.getElementById('idVal').value = id;
    document.getElementById('idVal2').value = id;
    document.getElementById("formButton").formAction = window.location.href; //variable
    document.getElementById("formButton2").formAction = window.location.href;
    $("#color2").val(color);
    $("#color2").change();
}

function authUser(title, variable){
    document.getElementById('windowTitle').innerHTML=title;
    document.getElementById("formButton").formAction = window.location.href+"/"+variable;
    document.getElementById("formButton").setAttribute('onclick', '');
    document.getElementById("formButton").setAttribute('type', 'submit');
    document.getElementById('specialPopUp').innerHTML = '';
    document.getElementById('clave').value = '';
}

function toggle(){
    $('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'Ocultar':'Mostrar más');});
}

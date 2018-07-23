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

function authUserSpecialFunctions(title, variable){
    document.getElementById('windowTitle').innerHTML=title;
    document.getElementById("formButton").setAttribute('type', 'button');
    document.getElementById("formButton").setAttribute('onclick', 'openWindow();');
    //document.getElementById('specialPopUp').innerHTML = '';
    document.getElementById('clave').value = '';
}

function openWindow(){
    var data = $('#passForm').serialize();
    var url = window.location.href+'/7';
    $('.bd-example-modal-sm').modal('hide');
    $.post(url, data, function(result){
        //alert('x');
        document.getElementById('specialPopUp').innerHTML = `\
        <div class="modal fade bd-example-modal-sm2"\
                tabindex="-1"\
                role="dialog"\
                aria-labelledby="mySmallModalLabel2"\
                aria-hidden="true">\
            <div class="modal-dialog modal-sm">\
                <div class="modal-content">\
                    <div class="modal-header">\
                        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">\
                            <i class="font-icon-close-2"></i>\
                        </button>\
                        <h4 class="modal-title" id="windowTitle">Configuración sensible</h4>\
                    </div>\
                        <div class="modal-body">\
                            <div class="form-group">\
                                <div class="checkbox-toggle">\
                                    <input type="checkbox" id="check-toggle-1" name="check-toggle-1" value="true"/>\
                                    <label for="check-toggle-1">Resetear alumnos inscritos</label>\
                                </div>\
                                <hr/>
                                <div class="checkbox-toggle">\
                                    <input type="checkbox" id="check-toggle-2" name="check-toggle-2" value="true"/>\
                                    <label for="check-toggle-2">Eliminar todos los posts</label>\
                                </div>\
                                <div class="checkbox-toggle">\
                                    <input type="checkbox" id="check-toggle-3" name="check-toggle-3" value="true"/>\
                                    <label for="check-toggle-3">Eliminar todas las imagenes</label>\
                                </div>\
                                <div class="checkbox-toggle">\
                                    <input type="checkbox" id="check-toggle-4" name="check-toggle-4" value="true"/>\
                                    <label for="check-toggle-4">Eliminar todos los videos</label>\
                                </div>\
                                <div class="checkbox-toggle">\
                                    <input type="checkbox" id="check-toggle-5" name="check-toggle-5" value="true"/>\
                                    <label for="check-toggle-5">Eliminar todos los avisos</label>\
                                </div>\
                            </div>\
                        </div>\
                        <div class="modal-footer">\
                            <div class="text-center">\
                                <button type="submit" class="btn btn-rounded btn-danger" formaction="" id="formButton2" >Guardar cambios</button>\
                            </div>\
                        </div>\
                </div>\
            </div>\
        </div>\
        `;
        $('.bd-example-modal-sm2').modal('show');
        document.getElementById("formButton2").formAction = window.location.href+"s/extraConfig"; ///admin/configs/extraConfig
    }).fail(function (){
        alert('no se pudo :v');
        
    });
}

function toggle(){
    $('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'Ocultar':'Mostrar más');});
}

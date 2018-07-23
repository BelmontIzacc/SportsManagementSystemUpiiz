var index = 1;
var indexHidden = 2;

function toggle1(){
    $('.details'+ index).slideToggle(function(){$('#more').html($('.details' + index).is(':visible')?'Oculto':'Siguiente →');});
    $('.details'+ indexHidden).slideToggle(function(){$('#more').html($('.details' + indexHidden).is(':visible')?'Oculto':'Siguiente →');});
    index++;
    indexHidden++;
    if(index > 4){
        index = 1;
        indexHidden = 2;
    }
}

function toggle2(){
    index--;
    indexHidden--;
    if(index == 0){
        index = 1;
        indexHidden = 2;
    }
    $('.details'+ index).slideToggle(function(){$('#more').html($('.details' + index).is(':visible')?'Oculto':'Siguiente →');});
    $('.details'+ indexHidden).slideToggle(function(){$('#more').html($('.details' + indexHidden).is(':visible')?'Oculto':'Siguiente →');});
}

$(function() {    
    $('#date_box').datetimepicker({
        format: 'DD-MM-YYYY',
        locale: 'es',
        viewMode: 'years'
    });
});

<?php

return [
    //Desarrollo
    'desarrollo' => true,
    'limite' => 10, //controla la cantidad de usuarios e informacion
    'taller' => 3, // cantidad de talleres
    'inscri' => 10, // cantidad de inscripciones para los talleres
    'stats' => 10, // controla las estadisticas de los talleres (fecha,asistencias,faltas,etc)
    //Fin desarrollo

    //Constantes
    'nombresAntecedentes' => array(
        'Ninguno',
        'Padres',
        'Abuelos',
        'Tios',
        'Hermanos',
        'Hijos',
    ),
    'sexos' => array(
        'Seleccionar',
        'Masculino',
        'Femenino',
    ),
    'documentacion' => array(
        'Seleccionar',
        'Completa',
        'Incompleta',
    ),
    'turnos' => array(
        'Seleccionar',
        'Matutino',
        'Vespertino',
    ),
    'familiar' => array(
        'Seleccionar',
        'Padre',
        'Hermano',
        'Tio',
        'Tutor legal',
    ),
    'tipos' => array(
        '',
        'Administrador',
        'Alumno',
        'Coordinador',
    ),
    'proveedores' => array(
        'Seleccionar',
        'UPIIZ-IPN',
        //'Padres',
        'Trabajo',
    ),
    //fin constantes

    //Estilos
    'statusStyleTextBox' => array(
        ' ',
        'form-control-blue-fill',
        'form-control-red-fill',
        'form-control-purple-fill',
        'form-control-orange-fill',
        'form-control-green-fill',
    ),
    'hasStyleTextBox' => array(
        ' ',
        'form-control-green-fill',
        'form-control-red-fill',
    ),
    'hasIconStyle' => array(
        ' ',
        'font-icon-ok',
        'font-icon-del',
    ),
    'hasColorStyle' => array(
        ' ',
        'color-green',
        'color-red',
    ),
    'stateLabel' => array(
        'label-default',
        'label-primary',
        'label-danger',
        'label-info',
        'label-warning',
        'label-success',
    ),
    'hasState' => array(
        ' ',
        'success',
        'danger',
    ),
    'numbers' => array(
        'One',
        'Two',
        'Three',
        'Four',
        'Five',
        'Six',
        'Seven',
        'Eight',
        'Nine',
        'Ten',
        'Eleven',
        'Twelve',
        'Thirteen',
        'Fourteen',
        'Fifteen',
        'Sixteen',
        'Seventeen',
        'Eighteen',
        'Nineteen',
        'Twenty',
        'TwentyOne',
        'TwentyTwo',
        'TwentyThree',
        'TwentyFour',
        'TwentyFive',
        'TwentySix',
        'TwentySeven',
        'TwentyEight',
        'TwentyNine',
        'Thirty',
        'ThirtyOne',
    ),
    //Fin estilos
];

<?php
    set_time_limit(-1);
?>
<!DOCTYPE html>
<html>
    <body background="https://i.imgur.com/1kKMCdT.png" style="background-position: center center; background-repeat: no-repeat;">
        <div class="Header">
            <img src="https://i.imgur.com/aCLHQwE.png" class="SEP">
            <div class="Insituciones">
                <div class="nombres">
                    <p style="font-size:11pt;">
                        Instituto Politécnico Nacional <br><br>
                    </p>
                    <p style="font-size:9pt;">
                        Unidad Profecional Interdisciplinarioa de Ingeniería <br>
                        Campus zacatecas <br>
                        Subdirección de Servicios Educativos e Integración Social <br>
                        Departamento de Servicios Estudiantiles-Coordinación de Deporte y Cultura
                    </p>
                </div>
                <div class="escudos">
                    <img src="https://i.imgur.com/KSsos3E.jpg" class="IPN">
                    <img src="https://i.imgur.com/dZUI8LN.jpg" class="UPIIZ">
                </div>
            </div>
        </div>
        <div class="fecha cuerpo">
            <p>
                Zacatecas, Zac. {{$dia}} de {{$mes}} de {{$anio}}<br>
                Constancia No. UPIIZ/DSE//{{$anio}}
            </p>
        </div>
        <div class="reporte cuerpo">
            <p>
                <h2 class="centrado">Constancia</h2>
                <br>
                A QUIEN CORRESPONDA
                <br><br>
                @foreach($user as $u)
                @foreach($taller as $t)
                    El que suscribe hace constar que
                    @if($u->sexo==0)
                        el
                    @else
                        la
                    @endif
                    estudiante:

                    <br>

                        <h3 class="alumno cuerpo centrado"> {{$u}} </h3>

                    Con número de boleta {{$u->boleta}}, el cual se encuentra inscrito en este plantel, <span class="blod">en el programa academico de
                        {{$u->informacion->carrera->nombre}}</span>, participo en el taller  de {{$t->nombre}} con un total de {{$t->duracion}} horas
                        en el periodo escolar {{$periodo}}.
                        <br><br>
                        A petición del interesado  y para los fines legales que convengan, se extiende la presente en la Ciudad de Zacatecas, Zac. a
                        los {{$fecha}}.
                @endforeach
                @endforeach
            </p>
        </div>
        <div class="firma cuerpo centrado">
            <div>
                <span class="blod">ATENTAMENTE <br>
                    "La técnica al servicio de la patria"</span>
            </div>
            <br><br><br><br>
            ________________________________________________
            <br>
            M. en C. Oscar Javier Ramos Herrera
            <br>
            Jefe del Departamento de Servicios Estudintiles.
        </div>
        <div class="coletilla">
            c.c.p L.O.D. Páblo César Urrutia Arroyo - Coordinador de Deporte y Cultura
            <br>
            Consecutivo
        </div>
        <div class="footer centrado">
            <div class="borde superior">

            </div>
            <div class="borde inferior">

            </div>
            <br>
            Boulevard El Bote S/N, Cerro del Gato, Ejido La Escondida, Col Cd. Administrativa, Zacatecas zac., C.P. 98160
            <br>
            Tel/Fax:(01-492) 9242419 y 9255998, correo electronico: deportes_upiiz@hotmail.com
        </div>
    </body>
    <head>

    <style media="screen" type="text/css">
        .SEP {
            height: 1.5cm;
            width: 4.91cm;
            position: absolute;
            left: 0.75cm;
            top: 0.23cm;
        }
        .IPN {
            height: 1.5cm;
            width: 1.01cm;
            position:absolute;
            right: 0.75cm;
        }
        .UPIIZ {
            height: 1.3cm;
            width: 1.3cm;
            position: absolute;
            right: 0.75cm;
            top: 1.85cm;
        }
        .nombres {
            text-align: right;
            position: absolute;
            right: 2.3cm;
            top: 0.25cm;
        }
        .fecha {
            font-family: thimes-new-roman;
            text-align: right;
            position: absolute;
            top: 4cm;
            right: 0.75cm;
        }
        .cuerpo {
            font-size: 12pt;
        }
        .blod  {
            font-weight:bold;
        }
        .centrado {
            text-align: center;
        }
        .footer {
            font-size: 9pt;
            position: absolute;
            bottom: 0cm;
            width: 19cm;
        }
        .reporte {
            position: absolute;
            top: 6cm;
        }
        .firma {
            position: absolute;
            top: 15cm;
        }
        .coletilla {
            font-size: 8pt;
            position: absolute;
            bottom: 1.5cm;
        }
        .borde {
            background: rgb(69, 4, 19);
        }
        .superior {
            height: 4px;

        }
        .inferior {
            position: relative;
            top: 2px;
            height: 1px;
        }
    </style>

    </head>
</html>

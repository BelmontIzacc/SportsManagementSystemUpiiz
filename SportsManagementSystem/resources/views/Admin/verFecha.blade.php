@extends('Admin.layout')
<?php
$index=4;
$classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";

?>
@section('title')
<title>Agregar Taller</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>

@stop

@section('popUp')
<div class="padre">
    <div class="row">
        <div class="container-fluid">
            <section class="card">
                <header class="card-header">
                    <div class="tbl-cell">
                        <div class="tbl tbl-item">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <div class="title">Taller {{$taller->nombre}}</div>
                                    <div class="amount-sm">Coordinador {{$taller->usuario}}</div>
                                </div>
                                <div class="tbl-cell tbl-cell-progress">

                                </div>
                            </div>
                        </div> <!--tbl tbl-item-->
                    </div> <!--tbl-cell-->
                    <div class="tbl-cell">
                        <div class="tbl tbl-item">
                            <div class="tbl-row">
                                    <div class="tbl-cell">                     
                                        <div class="col-lg-6 col-lg-offset-1 col-md-12 col-md-offset-1">
                                            <a href="{{asset('/admin/student')}}/{{$variable}}/studio/list" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
                                        </div>
                                    </div>
                                    {!!Form::open(array('method'=>'post', 'id'=>'forms'))!!}
                                    <input type="hidden" id="lista" name="lista"></input>
                                    <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1">
                                        <button onclick="setValue();" class="btn btn-rounded btn-inline btn-success" id="boton">Guardar cambios</button>
                                    </div>
                            </div>
                        </div> <!--tbl tbl-item-->
                    </div> <!--tbl-cell-->
                </header>
                        @if(count($errors) > 0)
                        <div class="alert alert-success alert-icon alert-close alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif 
<div class="col-md-6">
    <section class="widget widget-accordion card" id="accordion" role="tablist" aria-multiselectable="true">
        <article class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                    Fecha {{$fecha}}
                    <i class="font-icon font-icon-arrow-down"></i>
                </a>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                <div class="panel-collapse-in">
                <table id="table-edit" class="table table-bordered table-hover">
                            <div class="col-md-12">
                                 <div class="{{$classSizeForms}}">
                                    <fieldset class="form-group">
                                        <label class="form-label">Cambiar fecha</label>
                                          <div class='input-group date'>
                                                {!!Form::text('Date', null, ['class'=>'form-control', 'id'=>'date_box2', 'placeholder'=>'00/00/0000'])!!}
                                                <span class="input-group-addon">
                                                    <i class="font-icon font-icon-calend"></i>
                                                </span>
                                          </div>
                                    </fieldset>
                                </div>
                            </div> 
                </table>
                </div>
            </div>
        </article>
    </section>
</div>
{!!Form::close()!!}
                <div class="card-block">
                    <table id="table-edit" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="1">
                                #
                            </th>
                            <th class="text-center">Boleta</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Carrera/Bachiller</th>
                            <th class="text-center">Asistencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num=0; ?>
                        @foreach($asistencia as $st)
                        <tr id="$st->usuario->id" class="text-center">
                            <td>
                                <span class="tabledit-span tabledit-identifier"><?php echo $num=$num+1; ?></span>
                            </td>
                            <td class="table-icon-cell"><a href="{{asset('/admin/lists/')}}/{{$st->usuario->id}}" class="semibold">{{$st->usuario->boleta}}</a></td>
                            <td class="table-icon-cell">{{$st->usuario}}</td>
                            <td class="table-icon-cell">{{$st->usuario->informacion->carrera->nombre}}</td>
                            <td class="table-icon-cell">
                                <div class="col-sm-10 text-center">
                                    <div class="checkbox-toggle">
                                        <input type="checkbox" id="check-toggle-{{$st->usuario->id}}" name="check-toggle-{{$st->usuario->id}}" onclick="getValue({{$st->usuario->id}});"  
                                            @if($st->asistencia==1)
                                                checked
                                            @else
                                            @endif
                                        >
                                        <label for="check-toggle-{{$st->usuario->id}}">Si</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </section>
        </div><!--.page-center-->
    </div>
</div>
@stop

@section('subHead')

@stop

@section('content')

@stop

@section('scripts')

    <script type="text/javascript">
        var array = [];
        function getValue($id) {
           var isChecked = document.getElementById('check-toggle-'+$id).checked;
           var the_value = isChecked ? 1 : 0;

           if(array.length==0){
                array.push($id);
                //alert('Se agrega : ID '+array[0].id+' valor: '+array[0].status);
           }else{
                
                var len = array.length;
                var igual = 0;
                var pos = -1;
                var i = 0;

                for(i = 0 ; i<len;i++){
                    //alert(' ID '+array[i].id+' valor: '+array[i].status);
                    if(array[i] == $id){
                        igual=1;
                        pos=i;
                    }
                }

                if(igual==1){
                    var elementoEliminado = array.splice(pos, 1);
                }else{
                    array.push($id);
                    //alert('Se agrega : ID '+array[array.length-1].id+' valor: '+array[array.length-1].status);
                }

           }

        }

        function setValue() {
            document.getElementById('lista').value = array.toString();
            document.getElementById("boton").setAttribute('type', 'submit');
        }
    </script>

    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password-init.js')}}"></script>

    <script src="{{asset('/Template/js/plugins.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/desabilitar.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

@stop
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
                                    <div class="title">Usuario {{$user}}</div>
                                    <div class="amount-sm">Boleta {{$user->boleta}}</div>
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
                                            <a href="{{asset('/admin/lists')}}/{{$variable}}" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
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
                                {!!Form::close()!!}
                <div class="card-block">
                    <table id="table-edit" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="1">
                                #
                            </th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Agregar</th>
                        </tr>
                    </thead>
                    <tbody>

                    @if($taller == null)
                        <tr id="$st->usuario->id" class="text-center">
                            <td>
                                <span class="tabledit-span tabledit-identifier"></span>
                            </td>
                            <td class="table-icon-cell">No hay talleres disponibles para registrar
                            </td>
                            <td class="table-icon-cell">
                            </td>
                        </tr>
                    @else
                        <?php $num=0; ?>
                        @foreach($taller as $st)
                        <tr id="$st->usuario->id" class="text-center">
                            <td>
                                <span class="tabledit-span tabledit-identifier"><?php echo $num=$num+1; ?></span>
                            </td>
                            <td class="table-icon-cell"><a href="{{asset('/admin/student/')}}/{{$st->id}}/studio" class="semibold">{{$st->nombre}}</a></td>
                            <td class="table-icon-cell">
                                <div class="col-sm-10 text-center">
                                    <div class="checkbox-toggle">
                                        <input type="checkbox" id="check-toggle-{{$st->id}}" name="check-toggle-{{$st->id}}" onclick="getValue({{$st->id}});">
                                        <label for="check-toggle-{{$st->id}}"></label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
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
           
           if(the_value==1){
                array.push($id);
                //alert('status : '+the_value+' user_id : '+$id+' Valor guardado : '+array[$id]);
           }else{
                var pos = array.indexOf($id);
                var elementoEliminado = array.splice(pos, 1);
               //alert('status : '+the_value+' user_id : '+$id+' Valor guardado : '+array[$id]);
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
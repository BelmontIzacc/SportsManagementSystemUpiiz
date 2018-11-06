@extends('Admin.layout3')
<?php
$index=4;
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
                                        <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1">
                                            <a href="{{asset('/admin/student/')}}/{{$variable}}/studio" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
                                        </div>
                                    </div>
                                    {!!Form::open(array('method'=>'post', 'id'=>'forms'))!!}
                                    <input type="hidden" id="lista" name="lista"></input>
                                    <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1">
                                        <button onclick="setValue();" class="btn btn-rounded btn-inline btn-success" id="boton">Guardar cambios</button>
                                    </div>
                                    {!!Form::close()!!}
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
                            <th class="text-center">Semestre</th>
                            <th class="text-center">Añadir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num=0; ?>
                        @foreach($user as $u)
                            <tr id="{{$u->id}}" class="text-center">
                                <td>
                                    <span class="tabledit-span tabledit-identifier"><?php echo $num=$num+1; ?></span>
                                </td>
                                <td class="table-icon-cell">{{$u->boleta}}</td>
                                <td class="table-icon-cell">{{$u}}</td>
                                <td class="table-icon-cell">{{$u->informacion->carrera->nombre}}</td>
                                <td class="table-icon-cell">{{$u->informacion->semestre}}</td>
                                <td class="table-icon-cell">                             
                                    <div class="checkbox-toggle">
                                        <input type="checkbox" id="check-toggle-{{$u->id}}" name="check-toggle-{{$u->id}}" onclick="getValue({{$u->id}});">
                                        <label for="check-toggle-{{$u->id}}"></label>
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
            document.getElementById('lista').value = array;
            document.getElementById("boton").setAttribute('type', 'submit');
        }
    </script>

    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
@stop
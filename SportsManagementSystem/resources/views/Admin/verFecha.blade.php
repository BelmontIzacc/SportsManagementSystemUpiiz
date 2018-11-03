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
                                        <div class="col-lg-6 col-lg-offset-1 col-md-12 col-md-offset-1">
                                            <a href="{{asset('/admin/student')}}/{{$variable}}/studio/list" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
                                        </div>
                                    </div>
                            </div>
                        </div> <!--tbl tbl-item-->
                    </div> <!--tbl-cell-->
                </header>
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
                                    <select id="Select" class="form-control">
                                        <option  @if($st->asistencia==1)
                                            selected=""
                                        @endif
                                        >Asistencia</option>
                                        <option @if($st->asistencia==0)
                                            selected=""
                                        @endif
                                        >Falta</option>
                                    </select>
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
    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
@stop
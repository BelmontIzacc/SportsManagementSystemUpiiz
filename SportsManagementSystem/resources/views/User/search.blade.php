@extends('User.layout')

@section('title')
<title>Talleres</title>
@stop

@section('css')
@stop

@section('popUp')
@stop

@section('subHead')
Busqueda de talleres
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-6 col-lg-6 col-lg-offset-3 col-md-offset-2">
            <div class="form-group input-group">
                <input type="text" class="form-control" aria-label="Text input with dropdown button" id="info">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Buscar
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" onclick="identification(2);">Nombre del Taller</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!!Form::open(array('url'=>'/user/search', 'method'=>'post', 'id'=>'forms'))!!}
    <input type="hidden" id="opc" name="opc">
    <input type="hidden" id="busqueda" name="busqueda">
{!!Form::close()!!}

@if(isset($taller))
    <div class="container">
        <div class="row">
            <section class="widget widget-activity">
                <header class="widget-header">
                    Resultados
                    <span class="label label-pill lavel-primary">{{count($taller)}}</span>
                </header>
                <div>
                @foreach($taller as $t)
                     <div class="widget-activity-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                
                                </div>
                                <div class="tbl-cell">
                                    @unless($t->nombre == null)
                                    <p>
                                        <a href="{{asset('/user/inscripcion/taller/')}}/{{$t->id}}" class="semibold">{{$t->nombre}}</a>
                                    </p>
                                    @endunless
                                    <p>
                                        @unless($t->tipo->nombre == null)
                                            Tipo: {{$t->tipo->nombre}}
                                        @endunless
                                    </p>
                                    <p>
                                        @unless($t->usuario_id == null)
                                            Coordinador: {{$t->usuario}}
                                        @endunless
                                    </p>
                                    <p>
                                        @unless($t->usuario_id == null)
                                            <!--Coordinador: {{$t->coordinador}}-->
                                            Boleta del Coordinador: {{$t->usuario->boleta}}
                                        @endunless
                                    </p>
                                    <p>
                                        @unless($t->status == null)
                                            @if($t->status == 0) 
                                                Estatus: Inactivo
                                            @elseif($t->status == 1) 
                                                Estatus: Activo
                                            @elseif($t->status == 2) 
                                                Estatus: Suspendido temporalmente
                                            @elseif($t->status == 3) 
                                                Estatus: Sin Coordinador
                                            @endif
                                        @endunless
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </section>
        </div>
    </div>
@endif

@stop

@section('scripts')
    <script src="{{asset('/Template/js/custom/search.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@stop

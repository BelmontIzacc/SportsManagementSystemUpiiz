@extends('Admin.layout')

@section('title')
<title>Busqueda de registro</title>
@stop

@section('css')
@stop

@section('popUp')
@stop

@section('subHead')
Busqueda de registro
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
                        <a class="dropdown-item" onclick="identification(1);">Boleta especifica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!!Form::open(array('url'=>'/admin/search', 'method'=>'post', 'id'=>'forms'))!!}
    <input type="hidden" id="opc" name="opc">
    <input type="hidden" id="busqueda" name="busqueda">
{!!Form::close()!!}

@if(isset($user))
    <div class="container">
        <div class="row">
            <section class="widget widget-activity">
                <header class="widget-header">
                    Resultados
                    <span class="label label-pill label-primary">{{count($user)}}</span>
                </header>
                <div>
                @foreach($user as $u)
                    <div class="widget-activity-item">
                        <div class="user-card-row">
                            <div class="tbl-row">
                                <div class="tbl-cell tbl-cell-photo">
                                    
                                </div>
                                <div class="tbl-cell">
                                    @unless($u->informacion == null)
                                    <p>
                                        <a href="{{asset('/admin/lists')}}/{{$u->informacion->id}}" class="semibold">{{$u}}</a>
                                    </p>
                                    @endunless
                                    <p>
                                        @unless($u->email == null)
                                            Correo: {{$u->email}}
                                        @endunless
                                    </p>
                                    <p>
                                        Boleta: {{$u->boleta}}
                                    </p>
                                    <p>
                                        @unless($u->informacion == null)
                                            Institucion: {{$u->informacion->institucion->nombre}}
                                        @endunless
                                    </p>
                                    <p>
                                        @unless($u->informacion == null)
                                            Carrera: {{$u->informacion->carrera->nombre}}
                                        @endunless
                                    </p>
                                    <p>
                                        @if($u->completado == 1) 
                                            Status: Completado
                                        @else
                                            Status: Incompleto
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </section><!--.widget-tasks-->
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

@extends('User.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
  $classSize = "col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1";

  $Personales = '
    <div class="icon">
        <i class="font-icon font-icon-user"></i>
    </div>
    <div class="caption hidden-md-up">-1-</div>
    <div class="caption hidden-sm-down">Personal</div>
  ';

  $Domicilio = '
    <div class="icon">
        <i class="font-icon font-icon-server"></i>
    </div>
    <div class="caption hidden-md-up">-2-</div>
    <div class="caption hidden-sm-down">Domicilio</div>
  ';

  $Academicos = '
    <div class="icon">
        <i class="font-icon font-icon-fire"></i>
    </div>
    <div class="caption hidden-md-up">-3-</div>
    <div class="caption hidden-sm-down">Académico</div>
  ';

  $sexos = array(
        'Seleccionar',
        'Masculino',
        'Femenino',
    );
?>

@section('title')
<title>Informacion del usuario</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop
@section('popUp')
@stop
@section('content')

    <div class="row details1 text-center" style="display:block">
        <div class="{{$classSize}}">
            <section>
                <div class="steps-icon-progress" style="padding:30px">
                    <ul>
                        <li class="active">
                            {!!$Personales!!}
                        </li>
                        <li>
                            {!!$Domicilio!!}
                        </li>
                        <li>
                            {!!$Academicos!!}
                        </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Información personal</h5>
                <div class="row">
                  <div>
                    <label class="form-label">Sexo</label>
                    <label class="form-label" for="exampleInputDisabled2"> 
                      <input type="text" class="form-control" readonly placeholder="" value="Me quede aqui aiuda :'v"/>
                    </label>
                  </div>
                </div>
                
                <div class="row">
                  <div class="form-group">
                    <label class="form-label">Edad</label>
                    <label class="form-label" for="exampleInputDisabled2"> 
                      
                    </label>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <button type="button" class="btn btn-rounded btn-inline" onclick="toggle1();">
                            Siguiente →
                        </button>
                    </div>
                </div>
            </section><!--.steps-icon-block-->
        </div>
    </div><!--.row-->

    <div class="row details2 text-center" style="display:none">
        <div class="{{$classSize}}">
            <section>
                <div class="steps-icon-progress" style="padding:30px">
                    <ul>
                      <li class="active">
                          {!!$Personales!!}
                      </li>
                      <li class="active">
                          {!!$Domicilio!!}
                      </li>
                      <li>
                          {!!$Academicos!!}
                      </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Información del Domicilio</h5>
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                    <label class="form-label">Calle</label>
                      {!!Form::text('calle', null, ['class'=>'form-control','placeholder'=>'Calle', 'id'=>'calle'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                    <label class="form-label">Número exterior</label>
                      {!!Form::number('ext', null, ['class'=>'form-control', 'placeholder'=>'Número exterior', 'id'=>'exterior'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                        <label class="form-label">Número interior</label>
                      {!!Form::number('inter', null, ['class'=>'form-control', 'placeholder'=>'Número interior', 'id'=>'interior'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}} immsOnly">
                    <fieldset class="form-group">
                        <label class="form-label">Colonia</label>
                      {!!Form::text('colonia', null, ['class'=>'form-control','placeholder'=>'Colonia','id'=>'colonia'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                        <label class="form-label">Código postal</label>
                      {!!Form::text('cp', null, ['class'=>'form-control','placeholder'=>'Código Postal', 'id'=>'cp'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}} immsOnly">
                    <fieldset class="form-group">
                      
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">

                    </fieldset>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="button" class="btn btn-rounded btn-grey btn-inline" onclick="toggle2();">← Atrás</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="button" class="btn btn-rounded btn-inline" onclick="toggle1();">
                            Siguiente →
                        </button>
                    </div>
                </div>

            </section><!--.steps-icon-block-->
        </div>
    </div><!--.row-->

    <div class="row details3 text-center" style="display:none">
        <div class="{{$classSize}}">
          <section>
                <div class="steps-icon-progress" style="padding:30px">
                    <ul>
                        <li class="active">
                            {!!$Personales!!}
                        </li>
                        <li class="active">
                            {!!$Domicilio!!}
                        </li>
                        <li class="active">
                            {!!$Academicos!!}
                        </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Información Académica</h5>
                <div class="row">

                    <div class="{{$classSizeForms}}">
                        <div>
                            <fieldset class="form-group">
                                <label class="form-label">Semestre</label>   
                                    {!!Form::number('semestre', null, ['class'=>'form-control','placeholder'=>'Semestre','id'=>'semestre'])!!}
                            </fieldset>
                        </div>
                        <div>
                            <fieldset class="form-group">
                                <label class="form-label">Grupo</label>   
                                    {!!Form::text('grupo', null, ['class'=>'form-control','placeholder'=>'1CM1','id'=>'grupo'])!!}
                            </fieldset>
                        </div>
                    </div>

                </div>

                <br/>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="button" class="btn btn-rounded btn-grey btn-inline" onclick="toggle2();">← Atrás</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="submit" class="btn btn-rounded btn-inline btn-warning">
                            Finalizar
                        </button>
                    </div>
                </div>

            </section><!--.steps-icon-block-->
        </div>

    </div><!--.row-->

    <button type="button" class="btn btn-rounded btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm">Editar Informacion</button>
@stop
@section('scripts')

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/completeProfileToggle.js')}}"></script>

    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('/Template/js/lib/input-mask/jquery.mask.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password-init.js')}}"></script>

@stop
@extends('admin.layouts.master', ['body_class' => 'colaborador show'])
@section('content')
<div class="options-menu">
    <a href="{{ route('admin.solicitudes')}}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i>
        Volver</a>
</div>
<h2>Responder a una solicitud de Información</h2>
<div class="row">
    <div class="col-sm-3">        
        <h5>Nombre del Cliente</h5>
        {{$solicitud->name}}
    </div>
    <div class="col-sm-3">
        <h5>Apellido del Cliente</h5>
        {{$solicitud->second_name}}
    </div> 
    <div class="col-sm-3">        
        <h5>Email del Cliente</h5>
        {{$solicitud->email}}
    </div>   
    <div class="col-sm-3">
        <h5>Telefono del Cliente</h5>
        {{$solicitud->phone}}
    </div>    
</div>
<hr/>    
<div class="row">      
    <div class="col-sm-3">
        <h5>Centro</h5>
        {{$solicitud->center}}
    </div>    
    <div class="col-sm-3">
        <h5>¿Que servicio necesitas?</h5>
        {{$solicitud->service}}
    </div>    
    <div class="col-sm-3">
        <h5>¿Cómo accediste al formulario?</h5>
        {{$solicitud->fromwho}}
    </div>    
    <div class="col-sm-3">
        <h5>Objectivo del Cliente</h5>
        {{$solicitud->objective}}
    </div>  
</div>
<hr/>     
<div class="row">
    <div class="col-sm-12">        
        <h5>Descripción extra del Cliente</h5>
        {!!$solicitud->description!!}
    </div>
</div> 
<form id="training_form" class="training-form" action="{{ route('admin.solicitudes.replySend',$solicitud) }}"
    method="post">    
    {{ method_field('PUT') }}
    {{ csrf_field() }}    
    <div class="form-group">
        <label for="respuesta">Descripción</label>
        <textarea class="form-control" id="respuesta" name="respuesta" rows="6"
            tabindex="3">{{ old('respuesta') }}</textarea>
    </div>
    <div class="form-group text-center ">
        <button type="submit" class="btn btn-outline-primary " style="padding:8px 100px;margin-top:25px; ">
            Responder
        </button>
    </div>
</form>
@stop
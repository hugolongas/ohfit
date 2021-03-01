@extends('admin.layouts.master', ['body_class' => 'solicitud show'])
@section('content')
<div class="options-menu">
    <a href="{{ route('admin.solicitudes')}}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i>
        Volver</a>
</div>
<h2>Solicitud de información</h2>
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
@if($solicitud->replied)
<div class="row">
    <div class="col-sm-12">        
        <h5>Respuesta al Cliente</h5>
        {!!$solicitud->response!!}
    </div>
</div>
@else
<a href="{{ route('admin.solicitudes.reply', ['solicitud' => $solicitud])}}" class="btn btn-outline-dark">
    Responder
</a>
@endif

@stop
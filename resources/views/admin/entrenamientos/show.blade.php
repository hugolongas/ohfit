@extends('admin.layouts.master', ['body_class' => 'training show'])
@section('content')
<div class="options-menu">
    <a href="{{ route('admin.entrenamientos')}}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i>
        Volver</a>
</div>
<div>
    <h2>Información del producto</h2>
    <div class="row">
        <div class="col-12 col-md-6">
            <h5>Nombre producto</h5>
            {{$training->name }}
        </div>        
        <div class="col-12 col-md-6">
            <h5>Nombre del formulario</h5>
            {{$training->url }}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h5>Resumen producto</h5>
            {{$training->summary }}
        </div> 
    </div>
    <div class="row">
        <div class="col-12 col-md-4">
            <h5>Precio del producto (1 mes)</h5>
            {{$training->price_one}}
        </div>
        <div class="col-12 col-md-4">
            <h5>Precio del producto (3 meses)</h5>
            {{$training->price_three}}
        </div>
        <div class="col-12 col-md-4">
            <h5>Precio del producto (6 meses)</h5>
            {{$training->price_six}}
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h5>Descripción</h5>
            {!! $training->description !!}
        </div>
    </div>
</div>
@stop
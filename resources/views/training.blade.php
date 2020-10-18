@extends('layouts.master')
@section('bodyClass','online-training')
@section('title','OhFit - Entrenos')
@section('content')    
<div class="section-container">
    <h2 class="online-training-title">NUESTROS SERVICIOS</h2>
    <div class="online-training-container row">
        @foreach($trainings as $training)
        <div class="col-12 col-md-4">
            <div class="training-option">
                <h3 class="training-title">{{$training->name}}</h3>
                <div class="training-spacer"></div>
                <div class="training-price">€{{$training->price_one}}</div>                
                @if($training->description!="")
                <div class="training-spacer"></div>
                <a href="#demo_{{$training->id}}" class="btn btn-collapse-description" data-toggle="collapse">+ Información</a>
                <div id="demo_{{$training->id}}" class="collapse training-description">
                    {!! $training->description !!}
                </div>
                @endif
                <div class="training-spacer"></div>
                <a class="btn btn-ohfit" href="{{route('trainingform',['training'=>$training])}}">Reservar</a>
            </div>
        </div>
        @endforeach
        <div class="col-12 col-md-4">
            <div class="training-option">
                <h3 class="training-title">Valoracion GRATUITA</h3>
                <div class="training-spacer"></div>
                <div class="training-description">Entrevista con uno de nuestros entrenadores</div>                
                <div class="training-spacer"></div>
                <button class="btn btn-ohfit training-contact" data-toggle="modal" data-target="#modalReservar">Contactar</button>
            </div>
        </div>
    </div>
</div>
@stop
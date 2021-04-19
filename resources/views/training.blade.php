@extends('layouts.master')
@section('bodyClass', 'online-training')
@section('title', 'OhFit - Entrenos')
@section('content')
    <div class="section-container">
        <h2 class="online-training-title">ESCOGE TU PLAN</h2>
        <div class="online-training-container row">
            @foreach ($trainings as $training)
                <div class="col-12 col-md-4">
                    <div class="training-option">
                        <div class="training-info">
                            <h3 class="training-title">{{ $training->name }}</h3>
                            <div class="training-price"><span class="euro">€</span>{{ $training->price_one }}</div>
                            <div class="training-summary">{{ $training->summary }}</div>                         
                            <a class="btn btn-ohfit"
                                href="{{ route('trainingform', ['training' => $training]) }}">Selecciona</a>
                        </div>
                        @if ($training->description != '')
                            <div class="training-extra">
                                <div class="training-desc">
                                    {!! $training->description !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="col-12 col-md-4">
                <div class="training-option">
                    <div class="training-info">
                        <h3 class="training-title">Empresa</h3>
                        <div class="training-price"><span class="euro">€</span>0</div>      
                        <div class="training-summary">Contactar para definir el plan de entrenamiento empresarial.</div>                      
                        <button class="btn btn-ohfit training-contact" data-toggle="modal"
                            data-target="#modalReservar">Contactar</button>
                    </div>
                    @if ($training->description != '')
                        <div class="training-extra">
                            <div class="training-desc">
                                <ul>
                                    <li>Plan personalizado para empresas.</li>
                                    <li>Posibilidad de trabajo en grupo.</li>
                                    <li>Seguimiento de plan.</li>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
@section('meta')
<meta name="robots" content="index">
@stop
@extends('layouts.master')
@section('bodyClass', 'online-metodo')
@section('title', 'OhFit - Metodo')
@section('content')
    <div class="section-container">
        <h2 class="metodo-title">MÉTODO OH-FIT</h2>
        <div class="metodo-container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img class="img-fluid" src="{{ asset('/img/entrenador.jpg') }}">
                </div>
                <div class="col-12 col-md-6 metodo-text">
                    <h3 class="metodo-section-title">PREFERIMOS LO NATURAL</h3>
                    <p>Somos Licenciados en Ciencias de la Actividad Física y el Deporte enfocados en ofrecer entrenamientos
                        holísticos a medida, abordando tanto la parte física, como emocional y nutricional.</p>
                    <p>Nuestro método, consiste en 4 sencillos pasos.</p>
                    <ul>
                        <li>Evaluación inicial</li>
                        <li>Propuesta personalizada</li>
                        <li>Entrenamiento con tu coach</li>
                        <li>Consecución de tus objetivos</li>
                    </ul>
                </div>
            </div>
            <div class="text-extra">
                <p>
                    Con más de 10 años de experiencia como entrenadores, ofrecemos nuestros servicios a empresas y
                    particulares. Nuestro principal
                    objetivo es que disfrutes mientras logras tus objetivos.</p>
                <img src="{{ asset('/img/entrenador_2.jpg') }}" class="img-fluid" />
            </div>
        </div>
    </div>
@stop
@section('meta')
    <meta name="robots" content="all">
@stop

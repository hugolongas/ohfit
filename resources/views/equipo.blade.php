@extends('layouts.master')
@section('bodyClass', 'online-equipo')
@section('title', 'OhFit - Equipo')
@section('content')
    <div class="section-container">
        <h2 class="equipo-title">MÉTODO OH-FIT</h2>
        <div class="equipo-container">
            <div class="entrenador row">
                <div class="col-12 col-md-6">
                    <img class="img-fluid" src="{{ asset('/img/xavier.jpg') }}">
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="entrenador-name">Javier Chesa</h3>
                    <div class="entrenador-text">
                        <p>Licenciado en Ciencias de la Actividad Física y del Deporte, con más de 15 años de experiencia
                            enfocado en ofrecer entrenamientos holísticos a medida, abordando tanto la parte física, como
                            emocional y nutricional. Colegiado Nº 61207.</p>
                        <p>"Me apasiona el deporte, la nutrición saludable y ayudar a las personas a cumplir sus objetivos
                            para una mejor calidad de vida."</p>
                        <a href="https://www.linkedin.com/in/javierchesa/" target="_blank" class="linkedIn">
                            <img src="{{ asset('/img/linkedin.png') }}" width="42" height="42" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="entrenador row">
                <div class="col-12 col-md-6">
                    <img class="img-fluid" src="{{ asset('/img/albert.jpg') }}">
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="entrenador-name">Albert Porcar</h3>
                    <div class="entrenador-text">
                        <p>Toda la vida ligada al ámbito deportivo y de la salud, así que de forma natural lo que fue una
                            pasión se convirtió en mi profesión. Entrenador personal certificado con más de 15 años de
                            experiencia en el sector de la docencia, salud y rendimiento deportivo. Colegiado Nº 61200.</p>
                        <a href="https://www.linkedin.com/in/albertporcarrodriguez/" target="_blank" class="linkedIn">
                            <img src="{{ asset('/img/linkedin.png') }}" width="42" height="42" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
    
@section('meta')
<meta name="robots" content="all">
@stop

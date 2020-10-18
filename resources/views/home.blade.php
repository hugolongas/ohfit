@extends('layouts.master')
@section('bodyClass','home')
@section('title','OhFit')
@section('content')
<section id="cover" class="par paralax">
    <div class="title-content">
        Personal training & Healthy Business
    </div>
</section>
<section id="training" class="par">
    <div class="training-background">
        <div class="section-container">
            <div class="training-info">
                <h2 class="section-title">Entrenamiento personal / Asesoramiento nutricional</h2>
                <div class="training-text">
                    <p>Enfocado a personas que buscan mejorar su calidad de vida de forma eficaz, profesional y personalizada. Es la propuesta ideal para adoptar hábitos saludables, ganar en autoestima y potenciar los objetivos personales.</p>
                    <a href="{{route('training')}}" class="btn btn-ohfit btn-left">
                        ONLINE
                    </a>
                    <button class="btn btn-ohfit training-contact" data-toggle="modal" data-target="#modalReservar">
                        PRESENCIAL
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="app-container">
        <div class="bg-triangle"></div>
        <img src="{{ asset('img/erika_app.png') }}" />
    </div>
</section>
@if(count($opinions)>0)
<section id="opinions">
    <div class="section-container">
        <div class="opinions-info">
            <h2 class="section-title">Nuestros clientes nos avalan</h2>
            <div id="opinions-container">
                @foreach ($opinions as $o)
                <div class="opinion-item">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{asset('storage/opinions').'/'.$o->img}}"
                                class="img-fluid rounded-circle opinion-img">
                        </div>
                        <div class="col-6">
                            <div class="opinion-name">
                                {{$o->name}}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="opinion-text">
                                {!!$o->opinion!!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</section>
@endif
<div id="corporate-cover" class="paralax">
</div>
<section id="corporate" class="par">
    <div class="section-container">
        <h2 class="section-title">Servicios corporate</h2>
        <div class="corporate-info">
            <h4>Team Building a través de la actividad física</h4>
            <p>Para empresas que buscan una inyección de salud y buenos hábitos para sus trabajadores, nuestro servicio integral de actividad física y nutrición es la propuesta ideal que les permitirán cohesionar los equipos, fortalecer los valores corporativos, aumentar su rendimiento laboral, mejorar su salud y reducir el absentismo.</p>
        </div>
        <div class="corporate-gallery">
            <div class="row">
                <div class="corporate-item col-12 col-md-3">
                    <img src="{{ asset('img/bootcamp.jpg') }}" class="img-corporate img-fluid" />
                    <span class="txt-corporate">Bootcamps</span>
                </div>
                <div class="corporate-item col-12 col-md-3">
                    <img src="{{ asset('img/retos_deportivos.jpg') }}" class="img-corporate img-fluid" />
                    <span class="txt-corporate">Retos deportivos</span>
                </div>
                <div class="corporate-item col-12 col-md-3">
                    <img src="{{ asset('img/outdoor.jpg') }}" class="img-corporate img-fluid" />
                    <span class="txt-corporate">Outdoors</span>
                </div>
                <div class="corporate-item col-12 col-md-3">
                    <img src="{{ asset('img/workshop.jpg') }}" class="img-corporate img-fluid" />
                    <span class="txt-corporate">Workshops</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="weare" class="par">
    <div class="section-container">
        <div class="weare-info">
            <h2 class="section-title">Quienes Somos</h2>
            <div class="weare-text">
                Somos Licenciados en Ciencias de la Actividad Física y el Deporte enfocados en ofrecer entrenamientos holísticos a medida, abordando tanto la parte física, como emocional y nutricional Con más de 10 años de experiencia como entrenadores, ofrecemos nuestros servicios a empresas y particulares. Nuestro principal objetivo es que disfrutes mientras logras tus objetivos.
            </div>
            <div class="weare-trainer" trainer="trainer-javi">
                JAVIER CHESA
                <div class="trainer-code">Nº de Colegiado 61207</div>
            </div>
            <div class="weare-trainer" trainer="trainer-albert">
                ALBERT PORCAR
                <div class="trainer-code">Nº de Colegiado 61200</div>
            </div>
        </div>
        <div class="trainer-container">
            <div class="trainer-triange"></div>
            <img src="{{ asset('img/somos2.png') }}" id="trainer-img" />
        </div>
    </div>
</section>
@if(count($colaborators)>0)
<section id="colaborators">
    <div class="section-container">
        <div class="colaborators-info">
            <h2 class="section-title">Nuestros colaboradores</h2>
            <div id="colaborators-container" class="row">
                @foreach ($colaborators as $c)
                <div class="colaborator-item col-6 col-md-3">
                    <a href="{{$c->url}}" target="_blank">
                        <img src="{{asset('storage/colaborators')}}/{{$c->logo}}" class="img-fluid">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
</section>
@endif
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="/css/slick.css" />
<link rel="stylesheet" type="text/css" href="/css/slick-theme.css" />
@stop
@push('scripts')
<script src="/js/slick.js"></script>
<script>
    $(document).ready(function () {                
        $('#opinions-container').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            adaptiveHeight: true,
            autoplay: true,
            autoplaySpeed: 4000,
            arrows: false,responsive: [
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                }
            }
        ]
        });
    });
</script>
@endpush
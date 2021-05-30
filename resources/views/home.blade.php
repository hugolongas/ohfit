@extends('layouts.master')
@section('bodyClass', 'home')
@section('title', 'OhFit')
@section('content')
    <section id="cover" class="">
        <video autoplay muted loop>
            <source src="img/background-video.mp4" type="video/mp4">
        </video>
        <div class="title-content">
            <img src="img/logo-cover.png" />
            <div class="button-container">
                <a href="{{ route('services') }}" class="btn btn-ohfit-outline">SERVICIOS</a>
                <a href="{{ route('enterprise') }}" class="btn btn-ohfit-outline">WELLNESS EMPRESAS</a>
            </div>
        </div>
    </section>
    <section id="cita">
        <div class="cita-text">
            "SI SÓLO TE ENFOCAS EN RESULTADOS, NO VERÁS CAMBIOS; PERO SI TE CONCENTRAS EN LOS CAMBIOS, VERÁS RESULTADOS."
            <span class="cita-author">
                Jack Dixon
            </span>
        </div>
    </section>
    <section id="method">
        <div class="method-container">
            <h2>MÉTODO OH-FIT</h2>
            <div class="method-info">
                <p>Entrenamiento funcional, con fuerza útil para la vida.</p>
                <div class="method-steps">
                    <div class="step">
                        <div class="num">1</div>
                        <div class="text">evaluación</div>
                    </div>
                    <div class="step">
                        <div class="num">2</div>
                        <div class="text">propuesta</div>
                    </div>
                    <div class="step">
                        <div class="num">3</div>
                        <div class="text">entrenamiento</div>
                    </div>
                    <div class="step">
                        <div class="num">4</div>
                        <div class="text">objetivos</div>
                    </div>
                </div>
                <a href="{{ route('method') }}" class="btn btn-ohfit">DETALLES</a>
            </div>
        </div>
    </section>
    <section id="enterprise">
        <div class="enterpise-container">
            <h2 class="enterprise-title">
                SALUD Y BIENESTAR PARA EMPRESAS
            </div>
            <div class="enterprise-text">
                <p>Tu equipo es el activo más valioso, cuando siente que está en el mejor lugar para
                    trabajar da lo mejor de sí mismo y contribuye a ofrecer el máximo valor en la empresa.
                    Desde OH-FIT lo tenemos muy claro, hay que cuidar al trabajador. Nuestros planes de
                    salud y bienestar para empresas incrementan la productividad y motivación de los
                    empleados, repercutiendo positivamente en los beneficios de la empresa.</p>
            </div>
        </div>
    </section>
    <section id="weare">
        <div class="weare-img">
            <h2 class="weare-title mobile">SOBRE <span class="bigger">NOSOTROS</h2>
            <img src="img/weare.jpg" class="img-responsive" />
        </div>
        <div class="weare-container">
            <h2 class="weare-title desktop">SOBRE <span class="bigger">NOSOTROS</h2>
            <div class="weare-text">
                <p>Somos Javier Chesa y Albert Porcar, Licenciados en Ciencias de la Actividad Física y el Deporte enfocados
                    en ofrecer entrenamientos holísticos a medida, abordando tanto la parte física, como emocional y
                    nutricional
                </p>
                <p>Contamos con más de 10 años de experiencia como entrenadores y ofrecemos nuestros servicios a empresas y
                    particulares.
                </p>
                <p>
                    Nuestro principal objetivo es que disfrutes mientras logras tus objetivos.
                </p>
            </div>
        </div>
    </section>

    <section id="opinions">
        <div id="opinions-container" class="opinion-container">
            @foreach ($opinions as $o)
                <div class="opinion-item">
                    <div class="opinion-img">
                        <img src="{{ asset('storage/opinions') . '/' . $o->img }}" class="img-fluid rounded-circle">
                    </div>
                    <div class="opinion-name">
                        {{ $o->name }}
                    </div>
                    <div class="opinion-text">
                        {!! $o->opinion !!}
                    </div>
                    <div class="comillas">
                        <svg preserveAspectRatio="xMidYMid meet" data-bbox="0 19.7 200 161.209"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 19.7 200 161.209" role="img">
                            <g>
                                <path
                                    d="M78.2 19.8L85.7 33c.8 1.4 1.7 2.9 2.7 4.5-3.9 2.3-7.7 4.7-11.5 6.9-12.7 7.3-24.2 16.2-33.4 27.8-8.9 11.2-13 24.1-14.3 38.5 4.4 0 8.6-.4 12.8.1 6.8.7 13.9 1.1 20.3 3.3 13.1 4.4 19.5 14.3 20.7 27.9.6 7.4-.5 14.4-4.2 20.9-7.8 13.6-20.5 19.7-37.3 17.5-21.8-2.6-33.5-13.5-38.7-36.3-1.2-5.3-1.9-10.7-2.8-16v-15.4c.2-.6.5-1.2.6-1.9 1-10 4-19.3 8.8-28.1 11.1-20.4 27-36.3 46.3-48.9 7.2-4.7 14.5-9.4 21.8-14.1.2.1.4.1.7.1z">
                                </path>
                                <path
                                    d="M189.4 19.8c3.5 5.8 6.9 11.6 10.6 17.8-1.7 1-3.4 2.1-5.1 3-13.4 7.8-26.3 16.1-36.8 27.9-10.7 12-15.9 26-17.4 42.3 1.4 0 2.8-.1 4.2 0 8.3.6 16.8.2 24.8 2.1 18.9 4.4 26.1 18.9 24.8 36.6-1.3 16.9-15.3 30.5-31.9 31.3-12.2.6-23.9-1.1-33.5-9.5-8.7-7.6-12.6-17.9-15.1-28.8-7.2-32.2 2.1-59.7 23.9-83.6 11-12 23.8-21.8 37.6-30.3 4.5-2.8 8.8-5.8 13.3-8.8h.6z">
                                </path>
                            </g>
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div id="modal-empresa" class="modal-empresa" tabindex="-1" role="dialog">
        <div class="modal-empresa-body">
            <p>
                Eres una empresa y deseas información?
            </p>
            <p>
                Ponte en contacto con nosotros.
            </p>
            <form id="empresa_form_modal" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control form-empresa" placeholder="Tu nombre" id="empresa_name_modal"
                      name="empresa_name" required />
                  </div>
                  <div class="form-group col-md-6">
                    <input type="email" class="form-control form-empresa" placeholder="Tu email" id="empresa_email_modal"
                      name="empresa_email" required />
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-empresa" placeholder="Motivo de la consulta"
                    id="empresa_subject_modal" name="empresa_subject" required />
                </div>
                <div class="form-group">
                  <textarea class="form-control form-empresa" id="empresa_message_modal" name="empresa_message"
                    placeholder="Cuéntanos..." rows="5"></textarea>
                </div>
                <button type="submit" id="submit_empresa_modal" class="btn btn-ohfit"><span>Enviar</span></button>
                <button type="button" class="btn btn-ohfit float-right modal-empresa-close" aria-label="Close"><span
                    aria-hidden="true">Cancelar</button>                
              </form>
              <div id="response_empresa"></div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css" />
@stop
@push('scripts')
    <script src="/js/slick.js"></script>
    <script>
        $(document).ready(function() {
            var $windowWidth = $(window).width();
            if ($windowWidth > 500) {
                $('#opinions-container').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    adaptiveHeight: true,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    arrows: false,
                    responsive: [{
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }]
                });
            }
        });

    </script>
@endpush
@section('meta')
    <meta name="robots" content="all">
@stop

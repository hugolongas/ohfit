<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="_token" content="{{ csrf_token() }}">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="/css/main.min.css">
    <title>OH-FIT</title>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="20">
    <main id="main" class="warpper">
        <nav id="navbar" class="navbar fixed-top navbar-expand-lg">
            <div class="navbar-brand abs">
                <a href="{{ '/' }}" style="color:#777" data-target="0">
                    <img class="brand-logo" src="{{ asset('img/logo.png') }}" alt="Logo" />
                </a>
            </div>
        </nav>
        <div id="content" class="solicitud-info">
            <div class="section-container">
                <form id="solicitud_form" class="solicitud-form" action="{{ route('info.send') }}" method="post">
                    {{ csrf_field() }}
                    <fieldset>
                        <h2>Datos personales</h2>
                        <div class="form-group  form-section">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" placeholder="Nombre*" id="name" name="name"
                                        value="{{ old('name') }}" />
                                    @if ($errors->has('name'))
                                        <span class="error-message">Debes indicar tu nombre</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" placeholder="Apellido*" id="second_name"
                                        name="second_name" value="{{ old('second_name') }}" />
                                    @if ($errors->has('second_name'))
                                        <span class="error-message">Debes indicar tu apellido</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control"
                                        placeholder="Dirección de correo electrónico*" id="email" name="email"
                                        value="{{ old('email') }}" />
                                    @if ($errors->has('email'))
                                        <span class="error-message">Debes indicar tu Correo electrónico</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="phone" class="form-control" placeholder="Teléfono de contacto*"
                                        id="phone" name="phone" value="{{ old('phone') }}" />
                                    @if ($errors->has('phone'))
                                        <span class="error-message">Debes indicar un numero de teléfono de
                                            contacto</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="center">Centro</label>
                                    <select class="form-control" name="center" id="center">
                                        <option value="Vivagym Sagrada Familia" {{ old('center') == "Vivagym Sagrada Familia" ? 'selected' : '' }} >Vivagym Sagrada Familia</option>
                                        <option value="Vivagym Glorias" {{ old('center') == "Vivagym Glorias" ? 'selected' : '' }} >Vivagym Glorias</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="objective">Objectivos</label>
                                    <select class="form-control" name="objective" id="objective">
                                        <option value="Pérdida de peso" {{ old('objective') == "Pérdida de peso" ? 'selected' : '' }} >Pérdida de peso</option>
                                        <option value="Aumento de masa muscular" {{ old('objective') == "Aumento de masa muscular" ? 'selected' : '' }} >Aumento de masa muscular</option>
                                        <option value="Tonificación" {{ old('objective') == "Tonificación" ? 'selected' : '' }} >Tonificación</option>
                                        <option value="Salud" {{ old('objective') == "Salud" ? 'selected' : '' }} >Salud</option>
                                        <option value="Rendimiento deportivo" {{ old('objective') == "Rendimiento deportivo" ? 'selected' : '' }} >Rendimiento deportivo</option>
                                        <option value="Readaptación" {{ old('objective') == "Readaptación" ? 'selected' : '' }} >Readaptación</option>
                                        <option value="Otros" {{ old('objective') == "Otros" ? 'selected' : '' }} >Otro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" placeholder="Comentanos sobre tu objetivo"
                                        id="objective_info" rows="5"
                                        name="objective_info">{{ old('objective_info') }}</textarea>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="ok" name="politicaPrivacidad" id="politica-privacidad" required>
                                <label class="form-check-label" for="politicaPrivacidad">
                                  Al hacer click accepto la <a class="politica-privacidad" href="{{route('politica-privacidad')}}" target="_blank">política de privacidad</a>
                                </label>
                              </div>
                        </div>                        
                        <button type="submit" class="btn btn-ohfit">
                            Enviar
                        </button>
                    </fieldset>
                </form>
            </div>
            @if (session('status'))
            <div class="solicitud-container">
                <div class="solicitud-modal">
                    <h2>Muchas Gracias</h2>
                    <p>
                        {{ session('status') }}
                    </p>
                </div>
            </div>
        @endif
        </div>
        <section id="contact" class="footer par">
            <div class="footer-title">¿Preparado para el cambio?</div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="contact-block">
                            <h3 class="contact-title">CONTACTANOS</h3>
                            <div class="contact-info"><i class="fa fa-envelope"></i><span><a
                                        href="info@ohfit.barcelona">info@ohfit.barcelona</a></span></div>
                            <div class="contact-info"><i class="fa fa-map-marker"></i><span>VG Glories, Avinguda
                                    Diagonal, 208, Local C49, 08018 Barcelona</span></div>
                            <div class="contact-info"><i class="fa fa-map-marker"></i><span>VG Sagrada Familia, C. de
                                    Mallorca, 508, 08013 Barcelona</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
    </main>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="/js/main.js"></script>
</html>

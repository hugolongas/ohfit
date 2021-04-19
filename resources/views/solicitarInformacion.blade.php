@extends('layouts.master')
@section('bodyClass', 'solicitud-info')
@section('title', 'OhFit - Solicitar informacion')
@section('content')
    <div class="section-container">
        <h2 class="online-solicitud-title">SOLICITAR INFORMACION</h2>
        <div class="online-solicitud-container">
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
                        </div>
                        <div class="form-row">
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
                                <input type="email" class="form-control" placeholder="Dirección de correo electrónico*"
                                    id="email" name="email" value="{{ old('email') }}" />
                                @if ($errors->has('email'))
                                    <span class="error-message">Debes indicar tu Correo electrónico</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="phone" class="form-control" placeholder="Teléfono de contacto*" id="phone"
                                    name="phone" value="{{ old('phone') }}" />
                                @if ($errors->has('phone'))
                                    <span class="error-message">Debes indicar un numero de teléfono de
                                        contacto</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="center">Centro</label>
                                <select class="form-control" name="center" id="center">
                                    <option value="Vivagym Sagrada Familia"
                                        {{ old('center') == 'Vivagym Sagrada Familia' ? 'selected' : '' }}>
                                        Vivagym Sagrada Familia</option>
                                    <option value="Vivagym Glorias"
                                        {{ old('center') == 'Vivagym Glorias' ? 'selected' : '' }}>Vivagym
                                        Glorias</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="service">¿Que servicio necesitas?</label>
                                <select class="form-control" name="service" id="service">
                                    <option value="Entrenamiento Personal"
                                        {{ old('service') == 'Entrenamiento Personal' ? 'selected' : '' }}>
                                        Entrenamiento Personal
                                    </option>
                                    <option value="Entrenamiento en Grupos Reducidos (Xclusive)"
                                        {{ old('service') == 'Entrenamiento en Grupos Reducidos (Xclusive)' ? 'selected' : '' }}>
                                        Entrenamiento en Grupos Reducidos (Xclusive)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="fromwho">¿Cómo accediste al formulario?</label>
                                <select class="form-control" name="fromwho" id="fromwho">
                                    <option value="Staff Vivagym"
                                        {{ old('fromwho') == 'Staff Vivagym' ? 'selected' : '' }}>
                                        Staff Vivagym
                                    </option>
                                    <option value="Web/App" {{ old('fromwho') == 'Web/App' ? 'selected' : '' }}>
                                        Web/App
                                    </option>
                                    <option value="Cartelería" {{ old('fromwho') == 'Cartelería' ? 'selected' : '' }}>
                                        Cartelería
                                    </option>
                                    <option value="PT" {{ old('fromwho') == 'PT' ? 'selected' : '' }}>
                                        PT
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="objective">Objetivos</label>
                                <select class="form-control" name="objective" id="objective">
                                    <option value="Pérdida de peso"
                                        {{ old('objective') == 'Pérdida de peso' ? 'selected' : '' }}>Pérdida de
                                        peso</option>
                                    <option value="Aumento de masa muscular"
                                        {{ old('objective') == 'Aumento de masa muscular' ? 'selected' : '' }}>
                                        Aumento de masa muscular</option>
                                    <option value="Tonificación"
                                        {{ old('objective') == 'Tonificación' ? 'selected' : '' }}>Tonificación
                                    </option>
                                    <option value="Salud" {{ old('objective') == 'Salud' ? 'selected' : '' }}>
                                        Salud</option>
                                    <option value="Rendimiento deportivo"
                                        {{ old('objective') == 'Rendimiento deportivo' ? 'selected' : '' }}>
                                        Rendimiento deportivo</option>
                                    <option value="Readaptación"
                                        {{ old('objective') == 'Readaptación' ? 'selected' : '' }}>Readaptación
                                    </option>
                                    <option value="Otros" {{ old('objective') == 'Otros' ? 'selected' : '' }}>
                                        Otro</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea class="form-control" placeholder="Comentanos sobre tu objetivo"
                                    id="objective_info" rows="5"
                                    name="objective_info">{{ old('objective_info') }}</textarea>
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ok" name="politicaPrivacidad"
                                id="politica-privacidad" required>
                            <label class="form-check-label" for="politicaPrivacidad">
                                Al hacer click accepto la <a class="politica-privacidad"
                                    href="{{ route('politica-privacidad') }}" target="_blank">política de
                                    privacidad</a>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-ohfit">
                        Enviar
                    </button>
                </fieldset>
            </form>
        </div>
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
@stop
@section('meta')
<meta name="robots" content="none">
@stop
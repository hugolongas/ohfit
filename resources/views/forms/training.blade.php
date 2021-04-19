@extends('layouts.master')
@section('bodyClass', 'online-training training')
@section('title', 'OhFit - Formulario de Estado Físico')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-container">
            <ul>
                @if ($errors->has('name'))
                    <li>Debes indicar tu nombre y apellidos</li>
                @endif
                @if ($errors->has('dni'))
                    <li>Debes indicar tu Dni</li>
                @endif
                @if ($errors->has('birthdate'))
                    <li>Debes indicar tu fecha de nacimiento</li>
                @endif
                @if ($errors->has('email'))
                    <li>Debes indicar tu Correo electrónico</li>
                @endif
                @if ($errors->has('phone'))
                    <li>Debes indicar un numero de teléfono de contacto</li>
                @endif
                @if ($errors->has('address'))
                    <li>Debes indicar una dirección</li>
                @endif
                @if ($errors->has('training_objective'))
                    <li>Selecciona un objetivo como mínimo</li>
                @endif
                @if ($errors->has('training_body'))
                    <li>Indica que parte del cuerpo quieres priorizar</li>
                @endif
                @if ($errors->has('training_frequency'))
                    <li>Selecciona la disponibilidad para entrenar</li>
                @endif
                @if ($errors->has('training_experience'))
                    <li>Selecciona una opción</li>
                @endif
                @if ($errors->has('training_physical'))
                    <li>Selecciona una opción</li>
                @endif
                @if ($errors->has('training_health'))
                    <li>Debes indicar si has sufrido alguna lesión en los últimos 3 meses</li>
                @endif
                @if ($errors->has('training_disease'))
                    <li>Debes indicar si sufres alguna patologia/enfermedad que pueda afectar negativamente a la práctica de
                        tu
                        actividad física</li>
                @endif
                @if ($errors->has('training_annoyance'))
                    <li>Debes indicar si sufres de algún tipo de molestia muscular</li>
                @endif
                @if ($errors->has('training_health_text'))
                    <li>Debes indicar la liesión</li>
                @endif
                @if ($errors->has('training_disease_text'))
                    <li>Debes indicar la patologia/enfermedad</li>
                @endif
                @if ($errors->has('training_annoyance_text'))
                    <li>Debes indicar la molestia</li>
                @endif
                @if ($errors->has('training_place'))
                    <li>Selecciona un lugar como mínimo</li>
                @endif
                @if ($errors->has('price'))
                    <li>Debes seleccionar una tarifa</li>
                @endif
            </ul>
        </div>
    @endif
    <div class="section-container">
        <h2 class="online-training-title">Formulario de Estado Físico</h2>
        <div class="online-training-container">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                    aria-valuemax="100">
                </div>
            </div>
            <form id="training_form" class="training-form" action="{{ route('trainingStoreform') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="idType" value="{{ $training->id }}" />
                <input type="hidden" name="type" value="{{ $type }}" />
                <fieldset>
                    <h2>Datos personales</h2>
                    <div class="form-group  form-section">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Nombre y apellidos*" id="name"
                                    name="name" value="{{ old('name') }}" />
                                @if ($errors->has('name'))
                                    <span class="error-message">Debes indicar tu nombre y apellidos</span>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="DNI*" id="dni" name="dni"
                                    value="{{ old('dni') }}" />
                                @if ($errors->has('dni'))
                                    <span class="error-message">Debes indicar tu Dni</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="date" class="form-control" placeholder="Fecha de Nacimiento*" id="birthdate"
                                    name="birthdate" value="{{ old('birthdate') }}" />
                                @if ($errors->has('birthdate'))
                                    <span class="error-message">Debes indicar tu fecha de nacimiento</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <input type="email" class="form-control" placeholder="Dirección de correo electrónico*"
                                    id="email" name="email" value="{{ old('email') }}" />
                                @if ($errors->has('email'))
                                    <span class="error-message">Debes indicar tu Correo electrónico</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <input type="phone" class="form-control" placeholder="Número de teléfono*" id="phone"
                                    name="phone" value="{{ old('phone') }}" />
                                @if ($errors->has('phone'))
                                    <span class="error-message">Debes indicar un numero de teléfono de contacto</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="phone" class="form-control" placeholder="Profesión" id="profession"
                                    name="profession" value="{{ old('profession') }}" />
                            </div>
                            <div class="form-group  col-md-8">
                                <input type="text" class="form-control" placeholder="Dirección y código postal*"
                                    id="address" name="address" value="{{ old('address') }}" />
                                @if ($errors->has('address'))
                                    <span class="error-message">Debes indicar una dirección</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2> ¿En que podemos ayudarte?</h2>
                    <div class="form-group form-section">
                        <h4>Objetivos*</h4>
                        @if ($errors->has('training_objective'))
                            <span class="error-message">Selecciona un objetivo como mínimo</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Pérdida de peso"
                                name="training_objective[]" id="training_objective_1"
                                {{ (is_array(old('training_objective')) and in_array('Pérdida de peso', old('training_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_objective_1">
                                Pérdida de peso
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Aumento de masa muscular"
                                name="training_objective[]" id="training_objective_2"
                                {{ (is_array(old('training_objective')) and in_array('Aumento de masa muscular', old('training_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_objective_2">
                                Aumento de masa muscular
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tonificación" name="training_objective[]"
                                id="training_objective_3"
                                {{ (is_array(old('training_objective')) and in_array('Tonificación', old('training_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_objective_3">
                                Tonificación
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Salud" name="training_objective[]"
                                id="training_objective_4"
                                {{ (is_array(old('training_objective')) and in_array('Salud', old('training_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_objective_4">
                                Salud
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Rendimiento deportivo"
                                name="training_objective[]" id="training_objective_5"
                                {{ (is_array(old('training_objective')) and in_array('Rendimiento deportivo', old('training_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_objective_5">
                                Rendimiento deportivo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Readaptación" name="training_objective[]"
                                id="training_objective_6"
                                {{ (is_array(old('training_objective')) and in_array('Readaptación', old('training_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_objective_6">
                                Readaptación
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-control" type="text" name="training_objective_other_value"
                                    placeholder="Otra..." value="{{ old('training_objective_other_value') }}" />
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <textarea class="form-control" placeholder="Comentanos sobre tu objetivo"
                            id="training_objective_info"
                            name="training_objective_info">{{ old('training_objective_info') }}</textarea>
                    </div>
                    <div class="form-group  form-section">
                        <h4>¿Hay alguna parte de tu cuerpo en la que quieras priorizar?*</h4>
                        @if ($errors->has('training_body'))
                            <span class="error-message">Indica que parte del cuerpo quieres priorizar</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Hombros" name="training_body[]"
                                id="training_body_1"
                                {{ (is_array(old('training_body')) and in_array('Hombros', old('training_body'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_body_1">
                                Hombros
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Pectoral" name="training_body[]"
                                id="training_body_2"
                                {{ (is_array(old('training_body')) and in_array('Pectoral', old('training_body'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_body_2">
                                Pectoral
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Espalda" name="training_body[]"
                                id="training_body_3"
                                {{ (is_array(old('training_body')) and in_array('Espalda', old('training_body'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_body_3">
                                Espalda
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Core" name="training_body[]"
                                id="training_body_4"
                                {{ (is_array(old('training_body')) and in_array('Core', old('training_body'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_body_4">
                                Core
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Brazos" name="training_body[]"
                                id="training_body_5"
                                {{ (is_array(old('training_body')) and in_array('Brazos', old('training_body'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_body_5">
                                Brazos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Gluteos" name="training_body[]"
                                id="training_body_6"
                                {{ (is_array(old('training_body')) and in_array('Gluteos', old('training_body'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_body_6">
                                Gluteos
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="text" class="form-control" name="training_body_other_value"
                                    placeholder="Otra..." value="{{ old('training_body_other_value') }}" />
                            </label>
                        </div>
                    </div>
                    <div class="form-group  form-section">
                        <h4>Disponibilidad para entrenar*</h4>
                        @if ($errors->has('training_frequency'))
                            <span class="error-message">Selecciona la disponibilidad para entrenar</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="1" name="training_frequency"
                                id="training_frequency_1" {{ old('training_frequency') == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_frequency_1">
                                1 día
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="2" name="training_frequency"
                                id="training_frequency_2" {{ old('training_frequency') == 2 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_frequency_2">
                                2 días
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="3" name="training_frequency"
                                id="training_frequency_3" {{ old('training_frequency') == 3 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_frequency_3">
                                3 días
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="4" name="training_frequency"
                                id="training_frequency_4" {{ old('training_frequency') == 4 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_frequency_4">
                                4 días
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="5" name="training_frequency"
                                id="training_frequency_5" {{ old('training_frequency') == 5 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_frequency_5">
                                5 días
                            </label>
                        </div>
                    </div>
                    <div class="form-group  form-section">
                        <h4>Tiempo de entreno*</h4>
                        @if ($errors->has('training_time'))
                            <span class="error-message">Selecciona un tiempo de entreno</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="30" name="training_time"
                                id="training_time_1" {{ old('training_time') == 30 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_time_1">
                                30 minutos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="45" name="training_time"
                                id="training_time_2" {{ old('training_time') == 45 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_time_2">
                                45 minutos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="60" name="training_time"
                                id="training_time_3" {{ old('training_time') == 60 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_time_3">
                                1 hora
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="75" name="training_time" id="training_ime_4"
                                {{ old('training_time') == 75 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_time_4">
                                1 hora 15 minutos
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="90" name="training_time"
                                id="training_time_5" {{ old('training_time') == 90 ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_time_5">
                                1 hora 30 minutos
                            </label>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2> Experiencia deportiva</h2>
                    <div class="form-group  form-section">
                        <textarea class="form-control" placeholder="¿Actualmente prácticas algun deporte?"
                            id="training_sports" name="training_sports">{{ old('training_sports') }}</textarea>
                    </div>
                    <div class="form-group form-section">
                        <h4>¿Cual es tu experiencia en fitness?*</h4>
                        @if ($errors->has('training_experience'))
                            <span class="error-message">Selecciona una opción</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Principiante" name="training_experience"
                                id="training_experience_1"
                                {{ old('training_experience') == 'Principiante' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_experience_1">
                                Principiante
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Intermedio" name="training_experience"
                                id="training_experience_2"
                                {{ old('training_experience') == 'Intermedio' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_experience_2">
                                Intermedio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Avanzado" name="training_experience"
                                id="training_experience_3"
                                {{ old('training_experience') == 'Avanzado' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_experience_3">
                                Avanzado
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Experto" name="training_experience"
                                id="training_experience_4" {{ old('training_experience') == 'Experto' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_experience_4">
                                Experto
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <h4>Valora tu estado actual de forma física del 1 al 5, siendo 1 sedentario y 5 en plena forma.</h4>
                        @if ($errors->has('training_physical'))
                            <span class="error-message">Selecciona una opción</span>
                        @endif
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="1" name="training_physical"
                                    id="training_physical_1" {{ old('training_physical') == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="training_physical_1">
                                    1
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="2" name="training_physical"
                                    id="training_physical_2" {{ old('training_physical') == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="training_physical_2">
                                    2
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="3" name="training_physical"
                                    id="training_physical_3" {{ old('training_physical') == 3 ? 'checked' : '' }}>
                                <label class="form-check-label" for="training_physical_3">
                                    3
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="4" name="training_physical"
                                    id="training_physical_4" {{ old('training_physical') == 4 ? 'checked' : '' }}>
                                <label class="form-check-label" for="training_physical_4">
                                    4
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="5" name="training_physical"
                                    id="training_physical_5" {{ old('training_physical') == 5 ? 'checked' : '' }}>
                                <label class="form-check-label" for="training_physical_5">
                                    5
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>Estado de salud</h2>
                    <div class="form-group  form-section">
                        <h4>¿Has sufrido alguna lesión en los últimos 3 meses?</h4>
                        @if ($errors->has('training_health'))
                            <span class="error-message">Debes indicar si has sufrido alguna lesión en los últimos 3
                                meses</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="si" name="training_health"
                                id="training_health_1" {{ old('training_health') == 'si' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_health_1">
                                Sí
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="no" name="training_health"
                                id="training_health_2" {{ old('training_health') == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_health_2">
                                No
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="¿Cual?" id="training_health_text"
                                name="training_health_text" value="{{ old('training_health_text') }}" />
                            @if ($errors->has('training_health_text'))
                                <span class="error-message">Indica la lesión</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group  form-section">
                        <h4>¿Sufres alguna patologia/enfermedad que pueda afectar negativamente a la práctica de tu
                            actividad
                            física?*</h4>
                        @if ($errors->has('training_disease'))
                            <span class="error-message">Debes indicar si sufres alguna patologia/enfermedad que pueda
                                afectar
                                negativamente a la práctica de tu actividad física</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="si" name="training_disease"
                                id="training_disease_1" {{ old('training_disease') == 'si' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_disease_1">
                                Sí
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="no" name="training_disease"
                                id="training_disease_2" {{ old('training_disease') == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_disease_2">
                                No
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="¿Cual?" id="training_disease_text"
                                name="training_disease_text" value="{{ old('training_disease_text') }}" />
                            @if ($errors->has('training_disease_text'))
                                <span class="error-message">Debes indicar la patologia/enfermedad</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group form-section">
                        <h4>¿Sufres de algún tipo de molestia muscular o articular?*</h4>
                        @if ($errors->has('training_annoyance'))
                            <span class="error-message">Debes indicar si sufres de algún tipo de molestia muscular</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="si" name="training_annoyance"
                                id="training_annoyance_1" {{ old('training_annoyance') == 'si' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_annoyance_1">
                                Sí
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="no" name="training_annoyance"
                                id="training_annoyance_2" {{ old('training_annoyance') == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="training_annoyance_2">
                                No
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="¿Cual?" id="training_annoyance_text"
                                name="training_annoyance_text" value="{{ old('training_annoyance_text') }}" />
                            @if ($errors->has('training_annoyance_text'))
                                <span class="error-message">Debes indicar la molestia</span>
                            @endif
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>Lugar de entrenamiento y Material disponible</h2>
                    <div class="form-group form-section">
                        <h4>Donde realizaras los entrenamientos*</h4>
                        @if ($errors->has('training_place'))
                            <span class="error-message">Selecciona un lugar como mínimo</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="En casa" name="training_place[]"
                                id="training_place_1"
                                {{ (is_array(old('training_place')) and in_array('En casa', old('training_place'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_place_1">
                                En casa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="En gimnasio" name="training_place[]"
                                id="training_place_2"
                                {{ (is_array(old('training_place')) and in_array('En gimnasio', old('training_place'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_place_2">
                                En gimnasio
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <h4>De que material dispones (si no dispones de ningúno dejarlo en blanco)</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Mancuernas" name="training_material[]"
                                id="training_material_1"
                                {{ (is_array(old('training_material')) and in_array('Mancuernas', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_1">
                                Mancuernas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Barra olímpica"
                                name="training_material[]" id="training_material_2"
                                {{ (is_array(old('training_material')) and in_array('Barra olímpica', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_2">
                                Barra olímpica
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Fitball" name="training_material[]"
                                id="training_material_3"
                                {{ (is_array(old('training_material')) and in_array('Fitball', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_3">
                                Fitball
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Gomas" name="training_material[]"
                                id="training_material_4"
                                {{ (is_array(old('training_material')) and in_array('Gomas', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_4">
                                Gomas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Kettlebell" name="training_material[]"
                                id="training_material_5"
                                {{ (is_array(old('training_material')) and in_array('Kettlebell', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_5">
                                Kettlebell
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Pelota medicinal"
                                name="training_material[]" id="training_material_6"
                                {{ (is_array(old('training_material')) and in_array('Pelota medicinal', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_6">
                                Pelota medicinal
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sliders" name="training_material[]"
                                id="training_material_7"
                                {{ (is_array(old('training_material')) and in_array('Sliders', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_7">
                                Sliders
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Entrenamiento en suspensión"
                                name="training_material[]" id="training_material_8"
                                {{ (is_array(old('training_material')) and in_array('Entrenamiento en suspensión', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_8">
                                Entrenamiento en suspensión
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Cinta de correr"
                                name="training_material[]" id="training_material_9"
                                {{ (is_array(old('training_material')) and in_array('Cinta de correr', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_9">
                                Cinta de correr
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Bicicleta estática"
                                name="training_material[]" id="training_material_10"
                                {{ (is_array(old('training_material')) and in_array('Bicicleta estática', old('training_material'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="training_material_10">
                                Bicicleta estática
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-control" type="text" name="training_material_other_value"
                                    placeholder="Otra..." value="{{ old('training_material_other_value') }}" />
                            </label>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>¿Como nos has conocido?</h2>
                    <div class="form-group form-section">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Instagram" name="how[]" id="how_1"
                                {{ (is_array(old('how')) and in_array('Instagram', old('how'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="how_1">
                                Instagram
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Facebook" name="how[]" id="how_2"
                                {{ (is_array(old('how')) and in_array('Facebook', old('how'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="how_2">
                                Facebook
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Twitter" name="how[]" id="how_3"
                                {{ (is_array(old('how')) and in_array('Twitter', old('how'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="how_3">
                                Twitter
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Gimnasio de Glorias" name="how[]"
                                id="how_4"
                                {{ (is_array(old('how')) and in_array('Gimnasio Glorias', old('how'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="how_4">
                                Gimnasio de Glorias
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Un amigo" name="how[]" id="how_5"
                                {{ (is_array(old('how')) and in_array('Un amigo', old('how'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="how_5">
                                Un amigo
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="text" class="form-control" name="how_other_value" placeholder="Otra..."
                                    value="{{ old('how_other_value') }}" />
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <h4>Selecciona la tarifa</h4>
                        @if ($errors->has('price'))
                            <span class="error-message">Debes seleccionar una tarifa</span>
                        @endif
                        <div id="price_container">
                            @if (count($prices) == 1)
                                <label class="color-selected">
                                    <input type="hidden" name="price" value="1" />
                                    <span>{{ $prices[1] }} €</span></label>
                            @else
                                <select name="price" id="price">
                                    <option value="">Selecciona una opción</option>
                                    @foreach ($prices as $key => $p)
                                        {{ $valor = '' }}
                                        @if ($key == '1')
                                            {{ $valor = '1 mes' }}
                                        @elseif($key=="3")
                                            {{ $valor = '3 meses' }}
                                        @elseif($key=="6")
                                            {{ $valor = '6 meses' }}
                                        @endif
                                        <option value="{{ $key }}">{{ $valor }} - {{ $p }}€
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
                    <input type="submit" name="submit" class="submit btn btn-success" value="Enviar Solicitud" />
                </fieldset>
            </form>
        </div>
    </div>
    <div>
    </div>
@stop
@section('meta')
<meta name="robots" content="none">
@stop
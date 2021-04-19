@extends('layouts.master')
@section('bodyClass', 'online-training diet')
@section('title', 'OhFit - Formulario Dietético')
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
                @if ($errors->has('diet_objective'))
                    <li>Selecciona un objetivo como mínimo</li>
                @endif
                @if ($errors->has('diet_life_style'))
                    <li>Selecciona un estilo de vida</li>
                @endif
                @if ($errors->has('diet_training_frequency'))
                    <li>Selecciona cuantas horas de actividad física realizas a la semana</li>
                @endif
                @if ($errors->has('diet_disease'))
                    <li>Debes indicar si sufres alguna patologia/enfermedad que pueda afectar negativamente a la práctica de
                        tu
                        actividad física</li>
                @endif
                @if ($errors->has('diet_disease_text'))
                    <li>Debes indicar la patologia/enfermedad</li>
                @endif
                @if ($errors->has('price'))
                    <li>Debes seleccionar una tarifa</li>
                @endif
            </ul>
        </div>
    @endif
    <div class="section-container">
        <h2 class="online-training-title">Formulario Dietético</h2>
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
                    <div class="form-group">
                        <h4>Objetivos*</h4>
                        @if ($errors->has('diet_objective'))
                            <span class="error-message">Selecciona un objetivo como mínimo</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Pérdida de peso" name="diet_objective[]"
                                id="diet_objective_1"
                                {{ (is_array(old('diet_objective')) and in_array('Pérdida de peso', old('diet_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_objective_1">
                                Pérdida de peso
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Aumento de masa muscular"
                                name="diet_objective[]" id="diet_objective_2"
                                {{ (is_array(old('diet_objective')) and in_array('Aumento de masa muscular', old('diet_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_objective_2">
                                Aumento de masa muscular
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Dieta Vegana" name="diet_objective[]"
                                id="diet_objective_3"
                                {{ (is_array(old('diet_objective')) and in_array('Dieta Vegana', old('diet_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_objective_3">
                                Dieta Vegana
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Dieta Vegetariana"
                                name="diet_objective[]" id="diet_objective_4"
                                {{ (is_array(old('diet_objective')) and in_array('Dieta Vegetariana', old('diet_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_objective_4">
                                Dieta Vegetariana
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Rendimiento deportivo"
                                name="diet_objective[]" id="diet_objective_5"
                                {{ (is_array(old('diet_objective')) and in_array('Rendimiento deportivo', old('diet_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_objective_5">
                                Rendimiento deportivo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Dietaterapia" name="diet_objective[]"
                                id="diet_objective_6"
                                {{ (is_array(old('diet_objective')) and in_array('Dietaterapia', old('diet_objective'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_objective_6">
                                Dietaterapia
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="diet_objective_7">
                                <input type="text" class="form-control" id="diet_objective_7"
                                    name="diet_objective_other_value" placeholder="Otra..."
                                    value="{{ old('diet_objective_other_value') }}" />
                            </label>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>Estilos de vida</h2>
                    <div class="form-group form-section">
                        <h4>Estilo de vida*</h4>
                        @if ($errors->has('diet_life_style'))
                            <span class="error-message">Selecciona un estilo de vida</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Sedentario" name="diet_life_style"
                                id="diet_life_style_1" {{ old('diet_life_style') == 'Sedentario' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_life_style_1">
                                Sedentario
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Activo" name="diet_life_style"
                                id="diet_life_style_2" {{ old('diet_life_style') == 'Activo' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_life_style_2">
                                Activo
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <h4>Tipo de actividad física que realizas</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Cardiovascular"
                                name="diet_fisic_activity[]" id="diet_fisic_activity_1"
                                {{ (is_array(old('diet_fisic_activity')) and in_array('Cardiovascular', old('diet_fisic_activity'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_fisic_activity_1">
                                Cardiovascular
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Readaptación"
                                name="diet_fisic_activity[]" id="diet_fisic_activity_2"
                                {{ (is_array(old('diet_fisic_activity')) and in_array('Readaptación', old('diet_fisic_activity'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_fisic_activity_2">
                                Readaptación
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="diet_fisic_activity_3">
                                <input type="text" class="form-control" id="diet_fisic_activity_3"
                                    name="diet_fisic_activity_other_value" placeholder="Otra..."
                                    value="{{ old('diet_fisic_activity_other_value') }}" />
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <h4>¿Cuantas horas de actividad física realizas a la semana?*</h4>
                        @if ($errors->has('diet_training_frequency'))
                            <span class="error-message">Selecciona cuantas horas de actividad física realizas a la
                                semana</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="De 1h a 2h" name="diet_training_frequency"
                                id="diet_training_frequency_1"
                                {{ old('diet_training_frequency') == 'De 1h a 2h' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_training_frequency_1">
                                De 1h a 2h
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="De 2h a 4h" name="diet_training_frequency"
                                id="diet_training_frequency_2"
                                {{ old('diet_training_frequency') == 'De 2h a 4h' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_training_frequency_2">
                                De 2h a 4h
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="De 4h a 6h" name="diet_training_frequency"
                                id="diet_training_frequency_3"
                                {{ old('diet_training_frequency') == 'De 4h a 6h' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_training_frequency_3">
                                De 4h a 6h
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Más de 6h" name="diet_training_frequency"
                                id="diet_training_frequency_4"
                                {{ old('diet_training_frequency') == 'Más de 6h' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_training_frequency_4">
                                Más de 6h
                            </label>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>Historial de salud</h2>
                    <div class="form-group form-section">
                        <h4>Antecedentes no patológicos</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tabaco" name="diet_history[]"
                                id="diet_history_1"
                                {{ (is_array(old('diet_history')) and in_array('Tabaco', old('diet_history'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_history_1">
                                Tabaco
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Alcohol" name="diet_history[]"
                                id="diet_history_2"
                                {{ (is_array(old('diet_history')) and in_array('Alcohol', old('diet_history'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_history_2">
                                Alcohol
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="diet_history_3">
                                <input type="text" class="form-control" id="diet_history_3" name="diet_history_other_value"
                                    placeholder="Otra..." value="{{ old('diet_history_other_value') }}" />
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <input type="text" class="form-control" placeholder="Alergias e intolerancias"
                            id="diet_alergic_text" name="diet_alergic_text" />
                    </div>
                    <div class="form-group form-section">
                        <h4>¿Sufres alguna patologia/enfermedad?*</h4>
                        @if ($errors->has('diet_disease'))
                            <span class="error-message">Debes indicar si sufres alguna patologia/enfermedad que pueda
                                afectar
                                negativamente a la práctica de tu actividad física</span>
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="si" name="diet_disease" id="diet_disease_1"
                                {{ old('diet_disease') == 'si' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_disease_1">
                                Sí
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="no" name="diet_disease" id="diet_disease_2"
                                {{ old('diet_disease') == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_disease_2">
                                No
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="¿Cual?" id="diet_disease_text"
                                name="diet_disease_text" value="{{ old('diet_disease_text') }}" />
                            @if ($errors->has('diet_disease_text'))
                                <span class="error-message">Debes indicar la patologia/enfermedad</span>
                            @endif
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous btn btn-default" value="Anterior" />
                    <input type="button" name="next" class="next btn btn-info" value="Siguiente" />
                </fieldset>
                <fieldset>
                    <h2>Preferencias</h2>
                    <div class="form-group form-section">
                        <textarea class="form-control" id="diet_meals" name="diet_meals"
                            placeholder="Alimentos y comidas que sueles comer habitualmente">{{ old('diet_meals') }}</textarea>
                    </div>
                    <div class="form-group form-section">
                        <h4>Tipos de cociones y preparación de los alimentos</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Plancha" name="diet_cooking[]"
                                id="diet_cooking_1"
                                {{ (is_array(old('diet_cooking')) and in_array('Plancha', old('diet_cooking'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_cooking_1">
                                Plancha
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Horno" name="diet_cooking[]"
                                id="diet_cooking_2"
                                {{ (is_array(old('diet_cooking')) and in_array('Horno', old('diet_cooking'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_cooking_2">
                                Horno
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Frito" name="diet_cooking[]"
                                id="diet_cooking_3"
                                {{ (is_array(old('diet_cooking')) and in_array('Frito', old('diet_cooking'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_cooking_3">
                                Frito
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Al vapor" name="diet_cooking[]"
                                id="diet_cooking_4"
                                {{ (is_array(old('diet_cooking')) and in_array('Al vapor', old('diet_cooking'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_cooking_4">
                                Al vapor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Cocido" name="diet_cooking[]"
                                id="diet_cooking_5"
                                {{ (is_array(old('diet_cooking')) and in_array('Cocido', old('diet_cooking'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_cooking_5">
                                Cocido
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Crudo" name="diet_cooking[]"
                                id="diet_cooking_6"
                                {{ (is_array(old('diet_cooking')) and in_array('Crudo', old('diet_cooking'))) ? ' checked' : '' }}>
                            <label class="form-check-label" for="diet_cooking_6">
                                Crudo
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="diet_cooking_7">
                                <input type="text" class="form-control" id="diet_cooking_7" name="diet_cooking_other_value"
                                    placeholder="Otra..." value="{{ old('diet_cooking_other_value') }}" />
                            </label>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <textarea class="form-control" id="diet_favorite_foods" name="diet_favorite_foods"
                            placeholder="Alimentos preferidos">{{ old('diet_favorite_foods') }}</textarea>
                    </div>
                    <div class="form-group form-section">
                        <textarea class="form-control" id="diet_non_foods" name="diet_non_foods"
                            placeholder="Alimentos que nunca comerias">{{ old('diet_non_foods') }}</textarea>
                    </div>
                    <div class="form-group form-section">
                        <textarea class="form-control" id="diet_breakfast" name="diet_breakfast"
                            placeholder="¿Que sueles desayunar?">{{ old('diet_breakfast') }}</textarea>
                    </div>
                    <div class="form-group form-section">
                        <h4>Número de ingestas diarias</h4>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="1" name="diet_intakes"
                                    id="diet_intakes_1" {{ old('diet_intakes') == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="diet_intakes_1">
                                    1
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="2" name="diet_intakes"
                                    id="diet_intakes_2" {{ old('diet_intakes') == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="diet_intakes_2">
                                    2
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="3" name="diet_intakes"
                                    id="diet_intakes_3" {{ old('diet_intakes') == 3 ? 'checked' : '' }}>
                                <label class="form-check-label" for="diet_intakes_3">
                                    3
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="4" name="diet_intakes"
                                    id="diet_intakes_4" {{ old('diet_intakes') == 4 ? 'checked' : '' }}>
                                <label class="form-check-label" for="diet_intakes_4">
                                    4
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="5" name="diet_intakes"
                                    id="diet_intakes_5" {{ old('diet_intakes') == 5 ? 'checked' : '' }}>
                                <label class="form-check-label" for="diet_intakes_5">
                                    5
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="más de 5" name="diet_intakes"
                                    id="diet_intakes_6" {{ old('diet_intakes') == 'más de 5' ? 'checked' : '' }}>
                                <label class="form-check-label" for="diet_intakes_6">
                                    Más de 5
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-section">
                        <h4>Comes...</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Rápido" name="diet_eat" id="diet_eat_1">
                            <label class="form-check-label" for="diet_eat_1"
                                {{ old('diet_eat') == 'Rápido' ? 'checked' : '' }}>
                                Rápido
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Lento" name="diet_eat" id="diet_eat_2">
                            <label class="form-check-label" for="diet_eat_2"
                                {{ old('diet_eat') == 'Lento' ? 'checked' : '' }}>
                                Lento
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
@stop
@section('meta')
<meta name="robots" content="none">
@stop
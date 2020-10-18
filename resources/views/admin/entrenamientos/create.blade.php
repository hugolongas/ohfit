@extends('admin.layouts.master', ['body_class' => 'training create'])
@section('css')
@stop
@section('js')
@stop
@section('content')
<div class="options-menu">
    <a href="{{ route('admin.entrenamientos')}}"  class="btn btn-outline-dark"><i class="fa fa-angle-left"></i> Volver</a>
</div>
<h2>Crear producto</h2>
<form id="training_form" class="training-form" action="{{ route('admin.entrenamientos.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-12 col-md-6">
            <label for="name">Nombre producto*</label>
            <input type="text" class="form-control" placeholder="Nombre producto*" id="name" name="name"
                value="{{ old('name') }}" tabindex="1" />
            @if($errors->has('name'))
            <span class="error-message">Debes indicar el nombre del producto</span>
            @endif
        </div>
        <div class="form-group col-12  col-md-6">
            <label for="name">tipo de formulario*</label>
            <select id="url" name="url" class="form-control" tabindex="2">                
                <option value="training" @if (old('url')=="training" ) {{ 'selected' }} @endif>Entrenamiento
                </option>
                <option value="diet" @if (old('url')=="diet" ) {{ 'selected' }} @endif>Dieta
                </option>
                <option value="all" @if (old('url')=="all" ) {{ 'selected' }} @endif>Entrenamiento y Dieta
                </option>
            </select>            
            @if($errors->has('url'))
            <span class="error-message">Debes indicar un tipo</span>
            @endif
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12  col-md-4">
            <label for="name">Precio del producto 1 mes (solamente numeros)*</label>
            <input type="text" class="form-control" placeholder="Precio*" id="price_one" name="price_one"
                value="{{ old('price_one') }}"  tabindex="3"/>
            @if($errors->has('price_one'))
            <span class="error-message">Debes indicar el precio</span>
            @endif
        </div>
        <div class="form-group col-12  col-md-4">
            <label for="name">Precio del producto 3 mes (solamente numeros)</label>
            <input type="text" class="form-control" placeholder="Precio" id="price_three" name="price_three"
                value="{{ old('price_three') }}"  tabindex="4"/>                    
        </div>
        <div class="form-group col-12  col-md-4">
            <label for="name">Precio del producto 6 mes (solamente numeros)</label>
            <input type="text" class="form-control" placeholder="Precio" id="price_six" name="price_six"
                value="{{ old('price_six') }}"  tabindex="5"/>                    
        </div>
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="6"
            tabindex="6">{{ old('description') }}</textarea>
    </div>
    <div class="form-group text-center ">
        <button type="submit" class="btn btn-outline-primary " style="padding:8px 100px;margin-top:25px; ">
            Crear
        </button>
    </div>
</form>
@stop
@push('scripts')
<script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
<script>
	CKEDITOR.replace('description');
</script>
@endpush
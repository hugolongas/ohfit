@extends('admin.layouts.master', ['body_class' => 'colaborador create'])
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<style>
    .modal-body{
        height: 250px;
        padding-bottom: 25px;
    }
</style>
@stop

@section('content')
<div class="options-menu">
    <a href="{{ route('admin.colaboradores')}}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i>
        Volver</a>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<h2>Crear colaborador</h2>
<form enctype="multipart/form-data" id="colaborador_form" class="colaborador-form" action="{{ route('admin.colaboradores.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name">Colaborador</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"  
                placeholder="Colaborador...">
            </div>
            <div class="form-group">
                <label for="url">Enlace</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}"  placeholder="https://....">
            </div>
        </div>
        <div class="col-sm-6" >
            <div class="form-group">
                <label for="logo">Logo</label>
                <input  name="logo" type="file" id="logo" onchange="readURL(this)" class="form-control" />
                <img id="img" src="{{ asset('img/logo.png') }}" alt="" style="width: 100px;"/>
                @if($errors->has('logo'))
                        <span class="error-message">Debes seleccionar una imagen</span>
                    @endif
            </div>
        </div>
    </div>	
    <div class="form-group text-center ">
        <button type="submit" class="btn btn-outline-primary " style="padding:8px 100px;margin-top:25px; ">
            Crear
        </button>
    </div>
</form>

@stop
@push('scripts')
<script type="text/javascript">
	function readURL(input) {
		var url = input.value;
		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
		if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#img').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img').attr('{{ asset('img/logo.png') }}');
		}
	}
</script>
@endpush
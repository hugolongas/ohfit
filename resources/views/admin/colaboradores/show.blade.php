@extends('admin.layouts.master', ['body_class' => 'colaborador show'])
@section('content')
<div class="options-menu">
    <a href="{{ route('admin.colaboradores')}}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i>
        Volver</a>
</div>
<h2>colaborador</h2>
<div class="row">
    <div class="col-sm-6">        
        <h5>Nombre del Cliente</h5>
        {{$colaborador->name}}
        <hr/>
        <h5>Url</h5>
        {{$colaborador->url}}
    </div>
    <div class="col-sm-6">
        <img src="{{asset('storage/colaborators').'/'.$colaborador->logo}}" class="img-responsive img-thumbnail" />
    </div>
</div>
@stop
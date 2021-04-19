@extends('admin.layouts.master', ['body_class' => 'service show'])
@section('content')
<div class="options-menu">
    <a href="{{ route('admin.servicios')}}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i>
        Volver</a>
</div>
<h2>Opinion</h2>
<div class="row">
    <div class="col-sm-6">        
        <h5>Nombre del Servicio</h5>
        {{$service->title}}
        <hr/>
        <h5>Detalle</h5>
        {!!$service->detail!!}
    </div>
    <div class="col-sm-6">
        <img src="{{asset('storage/services').'/'.$service->img_url}}" class="img-responsive img-thumbnail" />
    </div>
</div>
@stop
@extends('admin.layouts.master', ['body_class' => 'opinion show'])
@section('content')
<div class="options-menu">
    <a href="{{ route('admin.opiniones')}}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i>
        Volver</a>
</div>
<h2>Opinion</h2>
<div class="row">
    <div class="col-sm-6">        
        <h5>Nombre del Cliente</h5>
        {{$opinion->name}}
        <hr/>
        <h5>Opinión</h5>
        {!!$opinion->opinion!!}
    </div>
    <div class="col-sm-6">
        <img src="{{asset('storage/opinions').'/'.$opinion->img}}" class="img-responsive img-thumbnail" />
    </div>
</div>
@stop
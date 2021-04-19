@extends('layouts.master')
@section('bodyClass', 'online-services')
@section('title', 'OhFit - Servicios')
@section('content')
    <div class="section-container">
        <h2 class="online-services-title">SERVICIOS</h2>
        <div class="online-services-container row">
            @foreach ($services as $service)
                <div class="col-12 col-md-4">
                    <div class="service">
                        <figure>
                            <img class="img-fluid" src="{{ asset('storage/services') . '/' . $service->img_url }}" />
                        </figure>
                        <div class="service-info">
                            <h3 class="service-title">{{ $service->title }}</h3>
                            <div class="service-detail">{!! $service->detail !!}</div>
                            <a class="btn btn-ohfit"
                                href="https://wa.me/34684160070?text=Me gustaría recibir información sobre su servicio de {{ $service->title }}">Contactar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
@section('meta')
<meta name="robots" content="all">
@stop

@extends('admin.layouts.master', ['body_class' => 'servicio edit'])
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
    <a href="{{ route('admin.servicios')}}" class="btn btn-outline-dark"><i class="fa fa-angle-left"></i>
        Volver</a>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<h2>Crear servicio</h2>
<form id="service_form" class="service-form" action="{{ route('admin.servicios.update',$service) }}"
    method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label for="name">Nombre del Cliente* </label>
            <input type="text" class="form-control" placeholder="Nombre del Servicio*" id="name" name="name"
                value="{{old('name', $service->title)}}" tabindex="1" />
            @if($errors->has('name'))
            <span class="error-message">Debes indicar el nombre</span>
            @endif
        </div>
        <div class="form-group col-sm-6">
            <div class="col-12">
                <input type="hidden" id="imgChanged" name="imgChanged" value="false" />
                <input type="hidden" id="imgName" name="imgName"
                    value="{{old('imgName', $service->img_url)}}" />
                <input type="hidden" id="prevImgName" name="prevImgName"
                    value="{{old('prevImgName', $service->img_url)}}" />
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <label class="cabinet center-block">
                                <figure>
                                    <img class="gambar img-responsive img-thumbnail"
                                        id="item-img-output"
                                        src="{{asset('storage/services').'/'.$service->img_url}}" />
                                    <figcaption><i class="fa fa-camera"></i></figcaption>
                                </figure>
                                <input type="file" class="item-img file center-block"
                                    name="file_photo" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="detail">Detalle</label>
        <textarea class="form-control" id="description" name="detail" rows="6"
            tabindex="6">{{old('detail', $service->detail)}}</textarea>
    </div>
    <div class="form-group text-center ">
        <button type="submit" class="btn btn-outline-primary " style="padding:8px 100px;margin-top:25px; ">
            Actualizar
        </button>
    </div>
</form>

<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>                
            </div>
            <div class="modal-body">
                <h4 class="modal-title" id="myModalLabel">Editar imagen</h4>
                <div id="upload-demo" class="center-block"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-default" data-dismiss="modal">Cerrar</button>
                <button type="button" id="cropImageBtn" class="btn btn-outline-primary">Cargar</button>
            </div>
        </div>
    </div>
</div>

@stop

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
@endpush

@section('js')
<script>
    CKEDITOR.replace('detail');
</script>

<script type="text/javascript">
    // Start upload preview image
    
    var $uploadCrop,tempFilename,rawImg,imageId;
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $('#cropImagePop').modal('show');
            rawImg = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
        else {
        swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
        width: 400,
        height: 400,
        type:'square'
        },
        enforceBoundary: false,
        enableExif: true
    });
    
    $('#cropImagePop').on('shown.bs.modal', function(){
        $uploadCrop.croppie('bind', {
        url: rawImg
        }).then(function(){
            console.log('jQuery bind complete');
        });
    });

    $('.item-img').on('change', function () {
        imageId = $(this).data('id');
        tempFilename = $(this).val();
        $('#cancelCropBtn').data('id', imageId); readFile(this); 
    });

    $('#cropImageBtn').on('click', function (ev) {
        imgName = $("#imgName").val();
        $uploadCrop.croppie('result', {
        }).then(function (img) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.servicios.uploadImage')}}",
                type: "POST",
                data: {"image":img,"imgName":imgName},
                success: function (resp) {
                    if(resp.status)
                    {
                        $('#item-img-output').attr('src',img);
                        $("#imgName").val(resp.imgName);
                        $("#imgChanged").val(true);
                        $('#cropImagePop').modal('hide');
                    }
                }
            });
        });
    });
</script>
@stop
@extends('admin.layouts.master', ['body_class' => 'service'])
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
@stop
@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@stop
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="options-menu">
	<a type="button" class="btn btn-outline-dark" href="{{ route('admin.servicios.create')}}">Crear Servicio</a>
</div>
<div class="table-cont">
	<table id="services-table" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>id</th>
				<th>Ver</th>				
				<th>Editar</th>
				<th>Nombre</th>
				<th>Detalle</th>
				<th>Imagen</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody></tbody>
		<tfoot>
			<tr>
				<th>id</th>
				<th>Ver</th>				
				<th>Editar</th>
				<th>Nombre</th>
				<th>Detalle</th>
				<th>Imagen</th>
				<th>Eliminar</th>
			</tr>
		</tfoot>
	</table>
</div>
@stop
@push('scripts')
<script>
	$(function() {
		datatable = $('#services-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('admin.servicios')}}',
			scrollX:true,
			searching:true,
			ordering:true,
			columns: [
			{ data: 'id'},
			{data: 'view'},
			{data: 'edit'},
			{data: 'title'},
			{data: 'detail'},
			{data: 'img_url'},
			{data: null, defaultContent: '<button class="btn btn-outline-secondary" accion="eliminar">Eliminar</button>'}
			],
			columnDefs: [
			{
				targets: [0],
				visible: false,
				searchable: false
			},					
			]
		});	

		$('#services-table tbody').on('click', 'button', function (ev) {
		var data = datatable.row($(this).parents('tr')).data();
		var accion = $(this).attr("accion");		
		switch (accion)
		{
			case "eliminar":
			{	
				if(confirm('Seguro que quieres eliminar la opinión')){
			$.ajaxSetup({
				headers:
				{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
			});
			var id = data["id"];										
			var url = '{{ route("admin.servicios.delete", "id") }}';
			url = url.replace('id', id);
			$.ajax({					
				url: url,
				type: 'POST',
				success: function () {
					$('#services-table').DataTable().ajax.reload();
					var alert="<div id='custom-alert' class='alert alert-danger'>Servicio Eliminado</div>";
					$("#content").prepend(alert);
					setTimeout(function(){
						$('#custom-alert').remove();
					}, 5000);
				}
			});
				}
			break;
			}
			
		}
		});
	});
	</script>
@endpush
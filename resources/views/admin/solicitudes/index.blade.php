@extends('admin.layouts.master', ['body_class' => 'solicitud'])
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
<div class="table-cont">
	<table id="solicitudes-table" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th>id</th>
				<th>Ver</th>								
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Centro</th>
				<th>Objetivo</th>				
				<th>Responder</th>
			</tr>
		</thead>
		<tbody></tbody>
		<tfoot>
			<tr>
				<th>id</th>
				<th>Ver</th>								
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Centro</th>
				<th>Objetivo</th>
				<th>Responder</th>
			</tr>
		</tfoot>
	</table>
</div>
@stop
@push('scripts')
<script>
	$(function() {
		datatable = $('#solicitudes-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{{route('admin.solicitudes')}}',
			scrollX:true,
			searching:true,
			ordering:true,
			columns: [
			{ data: 'id'},
			{data: 'view'},
			{data: 'name'},
			{data: 'second_name'},
			{data: 'email'},
			{data: 'center'},
			{data: 'objective'},
			{data: 'reply'}
			],
			columnDefs: [
			{
				targets: [0],
				visible: false,
				searchable: false
			},					
			]
		});	
	});
	</script>
@endpush
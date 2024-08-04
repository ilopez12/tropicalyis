@extends('layouts-horizontalmenu-light.master')

@section('css')
		<!-- Internal DataTables css-->
		<link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@include('layouts-verticalmenu-light.css')
@section('content')

	<!-- Page Header -->
	<div class="page-header ml-5 mr-5">
		<div>
			<h2 class="main-content-title tx-24 mt-5">Pedidos hasta el día {{\Carbon\Carbon::parse(date(now()))->locale('es')->translatedFormat('j \d\e F \d\e Y') }}</h2>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Pedidos</a></li>
				<li class="breadcrumb-item active" aria-current="page">Todos los Pedidos</li>
			</ol>
		</div>
	</div>
	<div class="card mb-2">
		<div class="card-body">
				<div class="row">
					<div class="col-12">
						<h3>Filtro</h3>
					</div>
				<div class="col-4">
					<label for="">Buscar Desde</label>
					<input type="date" name="desde" id="desde" class="form-control">
				</div>
				<div class="col-4">				
					<label for="">Hasta</label>
					<input type="date" name="hasta" id="hasta" class="form-control">
				</div>
				<div class="col-4">
					<label class="form-label"> <strong>Tipo</strong></label>
                    <select class="form-control select-lg select2" name="tipo" id="tipo">
                        <option value="0">Todos</option>
                        <option value="1">Sin Pago</option>
                        <option value="2">Pagados</option>
                    </select>
				</div>
				<div class="col-4">
					<label class="form-label"> <strong>Favoritos</strong></label>
                    <select class="form-control select-lg select2" name="fav" id="fav">
						<option value="0">Todos</option>
                        {{-- <option value="0">Todos</option>
                        <option value="1">Sin Pago</option>
                        <option value="2">Pagados</option> --}}
                    </select>
				</div>
				<div class="col-4 mt-4">
					<button type="button" class="btn ripple btn-primary btn-lg btn-block"><i class="fe fe-search"></i> Filtrar</button>
				</div>
				{{-- Buscar Por Favorito
				Buscar por Morosidad
				Buscar por Fecha  --}}
			</div>
		</div>
	</div>
	
	<div class="row row-sm  ">
		<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="table-responsive">
											<table id="example3" class="table table-striped table-bordered text-nowrap" >
												<thead>
													<tr>
														<th style="width: 10%">#</th>
														<th >Fecha</th>
														<th >Pedido</th>
														<th >Estatus</th>
														<th >Ordenado</th>
														<th >Detalle</th>
														<th >Total</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($ordenes as $key => $item)
														<tr>
															<td>{{$key+1}}</td>
															<td>{{$item['fecha']}}</td>
															<td>{{$item['encabezado']}}</td>
															<td>{{$item['estatus']}}</td>
															<td>{{$item['orden_d']}}</td>
															<td>{{$item['detalle']}}</td>
															<td>$ {{number_format($item['total'], 2 ) }}</td>
														</tr>
													@endforeach

												</tbody>
											</table>
										</div>
									</div>
								</div>
		</div>
	</div>
	<!-- End Row -->
@endsection
@section('script')
		<!-- Internal Data Table js -->
		<script src="{{URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection
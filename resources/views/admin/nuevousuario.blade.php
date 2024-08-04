@extends('layouts-verticalmenu-light.menumaestro')

@section('css')
		<!-- Internal DataTables css-->
		<link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
@include('layout.response')
<!-- Page Header -->
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Crear Usuario</h2>
	</div>
</div>
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">
                <div class="row row-sm">
                    <div class="col-lg-12">
                            <form action="createuser" method="POST">
                                @csrf
                                <div class="">
                                    <div class="row row-sm">
                                        <div class="col-lg-6 form-group">
                                            <label class="form-label">Nombre: <span class="tx-danger">*</span></label>
                                            <input class="form-control"   name="nombre" placeholder="Ingrese Nombre" required="" type="text">
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <label class="form-label">Celular: <span class="tx-danger">*</span></label>
                                            <input class="form-control" name="celular" id="celular" placeholder="Ingrese Celular" required="" type="number" onchange="muestranumero()"  pattern="[0-9]" >
                                            <input type="hidden" name="ultimos" id="ultimos">
                                        </div>
                                        <div class="col-lg-3">
                                            <label class="form-label">Contraseña:</label>
                                            <div class="input-group mb-3">
                                                <input maxlength="4"  aria-describedby="basic-addon2" aria-label="Contraseña" name="contrasena" class="form-control" placeholder="Contraseña" type="text">
                                                <div class="input-group-append">
                                                    <span id="pass" class="input-group-text" id="basic-addon2"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg form-group">
                                            <label class="form-label">Departamento:</label>
                                            <select name="depto" class="form-control select-lg select2">
												<option value="Archivos">Archivos</option>
												<option value="Contabilidad">Contabilidad</option>
												<option value="Piso 2">Piso 2</option>
												<option value="Planilla">Planilla</option>
											</select>
                                        </div>
                                    </div>
                                    <button class="btn ripple btn-main-primary btn-block" type="submit">Crear Usuario</button>
                                </div>
                            </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- End Row -->

@endsection
@section('script')
@include('layout.script')
@endsection
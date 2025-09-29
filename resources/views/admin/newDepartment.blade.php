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
		<h2 class="main-content-title tx-24 mg-b-5">Nuevo Departamento</h2>
	</div>
</div>
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">
                <form action="createDepartment" method="POST">
                    @csrf
                    <div class="col-lg-6 form-group">
                        <label class="form-label">Nombre: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="name" placeholder="Ingrese departamento" required="true" type="text">
                    </div>
                    <div>
                        <button class="btn ripple btn-main-primary btn-block" type="submit">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
@include('layout.script')
@endsection
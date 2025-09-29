@extends('layouts-verticalmenu-light.menumaestro')

@section('css')
		<!-- Internal DataTables css-->
		<link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content')

<!-- Page Header -->
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Listado de Departamentos</h2>
	</div>
    <div class="d-flex">
        <div class="justify-content-center">

            <a class="btn btn-primary my-2 btn-icon-text" style="color: white" href="/admin/addDepartment">
              <i class="si si-user-follow mr-2"></i>Agregar departamento
            </a>
        </div>
    </div>
</div>

<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="example2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Departamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $key => $item)
                                 <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@include('layout.script')
@endsection
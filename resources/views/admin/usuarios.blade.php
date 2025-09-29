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
		<h2 class="main-content-title tx-24 mg-b-5">Listado de Usuarios</h2>
	</div>
    <div class="d-flex">
        <div class="justify-content-center">

            <a class="btn btn-primary my-2 btn-icon-text" style="color: white" href="/admin/addUser">
              <i class="si si-user-follow mr-2"></i> Nuevo Usuario
            </a>
        </div>
    </div>
</div>
<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">
                <div class="row row-sm">
                    <div class="col-lg-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                    <div class="table-responsive">
									<table class="table" id="example2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Celular</th>
                                                <th>Dept</th>
                                                <th>Estado</th>
                                                <th>Bloq/Desbloq</th>
                                                <th>act/bloq-desbloq/desac-actv</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listado as $key => $item)
                          
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->department_name}}</td>
                                                <td>{{$item->estatus}}</td>
                                                @if ($item->bloqueo == 0 )
                                                <td></td>
                                                @else
                                                <td>Usuario Bloqueado</td>
                                                @endif
                                                <td class="btn-icon-list">
                                                    <a style="color: white"  onclick="updateUser('modal3', {{$item}}, {{$departments}})" data-placement="bottom" data-toggle="tooltip" title="Actualizar Usuario" class="btn ripple btn-primary btn-icon"><i class="si si-settings"></i></a>
                                                    <a style="color: white"  onclick="cambiaPass('modal1', {{$item->email}}, {{$item->id}})" data-placement="bottom" data-toggle="tooltip" title="Actualizar contraseña" class="btn ripple btn-primary btn-icon"><i class="si si-note"></i></a>
                                                    @if ($item->bloqueo == 0 )
                                                        <a style="color: white" onclick="bloqueo({{$item->id}}, {{$item->bloqueo}})" data-placement="bottom" data-toggle="tooltip" title="Bloquear" class="btn ripple btn-danger btn-icon"><i class="si si-lock"></i></a>
                                                    @else
                                                        <a style="color: white" onclick="bloqueo({{$item->id}}, {{$item->bloqueo}})" data-placement="bottom" data-toggle="tooltip" title="Desbloquear" class="btn ripple btn-info  btn-icon"><i class="si si-lock-open"></i></a>
                                                    @endif

                                                    @if ($item->estatus != 'ACTIVO')
                                                        <a style="color: white" onclick="actualizaestado({{$item->id}}, '{{$item->estatus}}')" data-placement="bottom" data-toggle="tooltip" title="Activar" class="btn ripple btn-success btn-icon">
                                                        <i class="si si-check"></i>
                                                    @else
                                                        <a style="color: white" onclick="actualizaestado({{$item->id}}, '{{$item->estatus}}')" data-placement="bottom" data-toggle="tooltip" title="Desactivar" class="btn ripple btn-warning btn-icon">
                                                            <i class="si si-ban"></i>
                                                        @endif
                                                       
                                                    </a>
                                                    <a style="color: white"  onclick="addfavorito({{$item->id}})" data-placement="bottom" data-toggle="tooltip" title="Agregar Favoritos" class="btn ripple btn-warning btn-icon"><i class="si si-star"></i></a>
                                                   
                                                </td>
                                            <td></td>
                                            </tr>
                                            @endforeach
                                   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@csrf
<div class="modal" id="modal1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Actualizar Contraseña </h6><button aria-label="Close" class="close" onclick="closeModal('modal1')" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {{-- <div class="col-lg-3"> --}}
                    <label class="form-label">Nueva Contraseña:</label>
                    <div class="input-group mb-3">
                        <input maxlength="4"  aria-describedby="basic-addon2" aria-label="Contraseña" name="contrasena" id="contrasena" class="form-control" placeholder="Nueva Contraseña" type="text">
                        <div class="input-group-append">
                            <span id="pass" class="input-group-text" id="basic-addon2"></span>
                        </div>
                    {{-- </div> --}}
                </div>
                <input type="hidden" name="ultimos" id="ultimos">
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-success" onclick="actualizapass()" type="button" >Actualiza Contraseña</button>
                <button class="btn ripple btn-secondary" onclick="closeModal('modal1')" type="button">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal2">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Favoritos</h6><button aria-label="Close" class="close" onclick="closeModal('modal2')" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div aria-multiselectable="true" class="accordion accordion-color" id="accordion2" role="tablist">
                    <div class="card">
                        <div class="card-header" id="headingOne2" role="tab">
                            <a aria-controls="collapseOne2" aria-expanded="false" data-toggle="collapse" href="#collapseOne2">Agregar Favoritos</a>
                        </div>
                        <div aria-labelledby="headingOne2" class="collapse show" data-parent="#accordion2" id="collapseOne2" role="tabpanel">
                            <div class="card-body">
                                <label class="form-label">Nombre Favorito:</label>
                            
                                <div class="input-group mb-3">
                                    <input aria-describedby="basic-addon2" aria-label="Favorito" name="favorito" id="favorito" class="form-control" placeholder="Nuevo Favorito" type="text">
                                </div>
                                <input type="hidden" id="id_principal">
                                <div class="input-group mb-3">
                                    <label class="form-label">Departamento:</label>
                                    <select name="depto" id="depto" class="form-control select-lg select2">
                                        @foreach( $departments as $key => $item)
										    <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
									</select>
                                </div>
                                <label class="form-label">Descripción:</label>
                                <div class="input-group mb-3">
                                    <textarea  class="form-control"  name="desc" id="desc" cols="3" rows="3"></textarea>
                                </div>
                                <button class="btn ripple btn-success" onclick="agregarFav()" type="button" >Agregar Favorito</button>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo2" role="tab">
                            <a aria-controls="collapseTwo2" aria-expanded="true" class="collapsed" data-toggle="collapse" href="#collapseTwo2">Listado Favoritos</a>
                        </div>
                        <div aria-labelledby="headingTwo2" class="collapse" data-parent="#accordion2" id="collapseTwo2" role="tabpanel">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example-input" class="table table-bordered text-nowrap">

                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Depto</th>
                                                <th>Estatus</th>
                                                <th>Ac</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div><!-- accordion -->
                <input type="hidden" name="id" id="id">
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary" onclick="closeModal('modal2')" data-dismiss="modal2" type="button">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal3">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Actualizar Usuario </h6><button aria-label="Close" class="close" onclick="closeModal('modal3')" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="row" id="userInfo">
                
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-success" onclick="actualizaUser()" type="button" >Actualiza Usuario</button>
                <button class="btn ripple btn-secondary" onclick="closeModal('modal3')" type="button">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@include('layout.script')
@endsection
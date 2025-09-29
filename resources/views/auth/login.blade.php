@extends('layouts-verticalmenu-light.master2')
@section('css')
@endsection
@section('content')
@if ($message =  Session::get('success'))
<script>
    swal({
        title: "Usuario Creado!",     
        icon: "success",
        button: {
            text: "Ok!",
            closeModal: false,
        },
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = "/login";
        }
        });
</script>
@endif
		
		<div class="page main-signin-wrapper">
	<form method="POST" action="{{ route('login') }}">
                        @csrf
		
			<div class="row signpages text-center">
				<div class="col-md-12">
					<div class="card">
						<div class="row row-sm">
							<div class="mt-5 col-lg-6 col-xl-5 d-none d-lg-block text-center">
									<img src="{{URL::asset('assets/img/brand/logo1.png')}}" class="header-brand-img mb-4" alt="user">
									
							</div>
							<div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
								<div class="container-fluid">
									<div class="row row-sm">
										<div class="card-body mt-2 mb-2">
											<img src="{{URL::asset('assets/img/brand/logo.png')}}" class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
											<div class="clearfix"></div>
											<form>
												<h5 class="text-left mb-2">Iniciar Sesión</h5>
												<div class="form-group text-left">
													<label>Teléfono</label>
													<input class="form-control"  type="number" name="email" id="email">
												</div>
												<div class="form-group text-left">
													<label>Contraseña</label>
													<input class="form-control" name="password" id="password" type="password">
												</div>
												<button class="btn ripple btn-main-primary btn-block">Iniciar</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->
	</form>
		</div>
		<!-- End Page -->

@endsection
@section('script')
<script src="{{URL::asset('assets/js/main.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
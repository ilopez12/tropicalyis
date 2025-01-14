<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">
		<link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />

        @include('layouts-verticalmenu-light.css')

	</head>

    @if ($message =  Session::get('success'))
    <script>
        swal({
             title: "Orden Pedida!",     
             icon: "success",
             button: {
                 text: "Ok!",
                 closeModal: false,
               },
            })
            .then((willDelete) => {
             if (willDelete) {
                 window.location.href = "/menu";
             }
            });
    </script>
    @endif
<body class="mg-l-15 mg-r-15">
    <form id="ped">  
        @csrf


<!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-10 m-t-20">
            <h2 class="main-content-title tx-24 mg-b-5">Pedidos del Dia {{\Carbon\Carbon::parse(date(now()))->locale('es')->translatedFormat('j \d\e F \d\e Y') }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/menu">Menu Pedidos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/menu">Menu</a></li>
            </ol>
            </div>
            <div class="col-2 m-t-20">
                <a class="btn btn-success" onclick="ordenar()" type="submit">Ordenar</a>
              </div>
        </div>
        
    </div>
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        {{-- <h6 class="main-content-label mb-1">Pedidos del día {{\Carbon\Carbon::parse($ordenes[0]->fecha)->locale('es')->translatedFormat('j \d\e F \d\e Y') }}</h6> --}}
                        <div>
                            {{-- <h6 class="main-content-label mb-1">Pedidos del día {{\Carbon\Carbon::parse($ordenes[0]->fecha)->locale('es')->translatedFormat('j \d\e F \d\e Y') }}</h6> --}}
                        
                        
                        </div>
                    
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="example2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Orden a nombre de</th>
                                    <th>Cantidad</th>
                                    <th>Detalle</th>
                                    <th>Total</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordenes as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item['orden_d']}}</td>
                                    <td>{{$item['cantidad']}}</td>
                                    <td>{{$item['detalle']}}</td>
                                    <td>$ {{number_format($item['total'], 2 ) }}</td>
                                    <td><a onclick="eliminarcarrito({{$item['id']}})"><i class="si si-trash" data-toggle="tooltip" title="" data-original-title="si-trash"></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="row row-sm">	
                        <div class="col-sm-6">
                            <h3 class="text-muted card-sub-title ">Total de Pedidos: {{$pedidos}}</h3>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="text-muted card-sub-title">Monto Total: $ {{ number_format($total, 2 ) }}</h3>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</form>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="{{URL::asset('assets/js/main.js')}}"></script>
<script src="{{URL::asset('assets/js/moments.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

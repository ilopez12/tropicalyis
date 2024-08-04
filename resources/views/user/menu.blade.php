@extends('layouts-horizontalmenu-light.master')

@include('layout.header')
@section('css')

@endsection
@section('content')
  @include('layout.response')
 

<form  id="pedido">
  @csrf

  <div class="row">
      <div class="col-4" style="background-color: #905128">
        <img style="width: 100%; text-align: left;" src="{{URL::asset('assets/img/bg3.png')}}" alt="">
      </div>
      <div class="col-8">
        <div class="row">
          <div class="col-12 mt-5" style="text-align: center;">
              <h3>Listado del Menú del dia {{\Carbon\Carbon::parse(date(now()))->locale('es')->translatedFormat('j \d\e F \d\e Y') }}</h3>
          </div>
          <div class="row mt-5">
            <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
            
              @foreach ($restaurante as $key => $val)
                <div class="card">
                  <div class="card-header" id="headingOne" role="tab">
                    @php
                        // dd(\Carbon\Carbon::parse($menu[0]->dia)->format('Y-m-d') == \Carbon\Carbon::parse(date(now()))->format('Y-m-d'));
                    @endphp
                    @if (\Carbon\Carbon::parse($menu[0]->dia)->format('Y-m-d') == \Carbon\Carbon::parse(date(now()))->format('Y-m-d'))
                    <a aria-controls="collapseOne" aria-expanded="true" data-toggle="collapse" href="#collapseOne{{$val->id}}"> Menú Restaurante {{$val->nombre}} dia</a>
                    @else
                    <a aria-controls="collapseOne" aria-expanded="true" data-toggle="collapse" href="#collapseOne{{$val->id}}"> Menú Restaurante {{$val->nombre}}</a>
                    @endif
                    
                  </div>
                 
                  <div aria-labelledby="headingOne" class="collapse" data-parent="#accordion" id="collapseOne{{$val->id}}" role="tabpanel">
                      <div class="row  m-1">
                      <div class="col-lg-6">
                        <h6>PRINCIPAL</h6>
                        <table>
                          <tbody>
                            @foreach ($menu as $key => $item)
                                @if ($item->tipo == 'Proteina' && $item->restaurante == $val->id)
                                <tr>
                                  <td><input onclick="actualiza_costo({{json_encode($item)}}, {{json_encode($acomp)}}, {{json_encode($menu)}})" type="radio" name="proteina" value="{{$item->id}}" id="proteina[{{$key}}]"> <input type="hidden" name="fecha[{{$key}}]" id="fecha[{{$key}}]" value="{{$item->fecha}}"></td>
                                  <td  style="width: 60%">{{$item->nombre}}</td>
                                  <td>${{number_format($item->costo, 2)}}</td>
                                </tr>   
                                @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="col-lg-6">
                        <h5 class="col-md-10 col-form-label text-md form-check-label" for="flexRadioDefault2">Observ. Adicionales</h5>
                        <textarea class="form-control" name="coments" id="coments" cols="3" rows="5"></textarea>
                      </div>
                    </div>                  
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="modal" id="modal-acomp">
            <div class="modal-dialog" role="document">
              <div class="modal-content modal-content-demo">
                <div class="modal-header">
                  <h6 class="modal-title">Orden</h6><button aria-label="Close" class="close" onclick="cerrar('modal-acomp')" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <div class="col-lg-12">
                    <h6>ACOMPAÑAMIENTOS</h6>
                    <table style="text-align:left">
                      <thead>

                      </thead>
                      <tbody id="tbodyacom">
                        
                      </tbody>
                    </table>
                  </div>
                  <hr>
                  <div class="col-lg-12">
                    <h6>ADICIONALES</h6>
                    <table>
                      <tbody  id="tbodyadicional">
                        
                      </tbody>
                    </table>
                    
                  </div>
                  <input type="hidden" name="propia" id="propia">
                </div>
                <div class="modal-footer">
                  <a class="btn ripple btn-primary" style="color: white" onclick="abrir('modal-cant')" data-dismiss="modal">Agregar al carrito</a>
                  <button class="btn ripple btn-secondary" onclick="cerrar('modal-acomp')" type="button">Cerrar</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal" id="modal-datepicker">
            <div class="modal-dialog" role="document">
              <div class="modal-content modal-content-demo">
                <div class="modal-header">
                  <h6 class="modal-title">Orden</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <div class="col-12 mg-t-25">
                    <h5 for="">Orden</h5>
                    <div class="form-check mg-t-15">
                      <input onclick="ocultainp()" class="form-check-input" value="si" checked type="radio" name="orden_propia" id="orden_propia" checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                        Propia
                      </label>
                    </div>
                    <div class="form-check mg-t-15">
                      <input onclick="muestrainp()" class="form-check-input" value="no" type="radio" name="orden_propia" id="orden_propia" >
                      <label class="form-check-label" for="flexRadioDefault2">
                        De alguien máse
                      </label>
                        <select name="orden_dee" id="orden_dee" onchange="ver()" class="form-control select-lg select2">
                          @if (isset($recurrentes))
                            @foreach ($recurrentes as $item)
                            <option value="{{$item->nombre}}">{{$item->nombre}}</option> 
                            @endforeach
                          @endif
                          
                          <option value="1">Agregar</option>
                        </select>
                      {{-- <input class="form-control" type="text" name="orden_dee" id="orden_dee" > --}}
                    </div>
                    
                  </div>
                  <input type="hidden" name="propia" id="propia">
                </div>
                <div class="modal-footer">
                  <button class="btn ripple btn-primary" onclick="agregar()" data-dismiss="modal"  type="button">Agregar al carrito</button>
                  <button class="btn ripple btn-secondary" onclick="cerrar('modal-datepicker')" data-dismiss="modal" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal" id="modal-cant">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content modal-content-demo">
                <div class="modal-header">
                  <h6 class="modal-title">Cantidad</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <div class="col-12 mg-t-25">
                    <h5 for="">Cantidad</h5>
                   
                    <div class="col-lg-12">
                      <input  class="form-control" value="1" type="number" name="cantidad_r" id="cantidad_r" >
                    </div>
                    
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button class="btn ripple btn-primary" onclick="abrir2('modal-datepicker')"  data-dismiss="modal"  type="button">Agregar al carrito</button>
                  <button class="btn ripple btn-secondary" onclick="cerrar('modal-cant')" data-dismiss="modal" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal" id="modal-recurrente">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content modal-content-demo">
                <div class="modal-header">
                  <h6 class="modal-title">Agregar Recurrente</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <div class="col-12 mg-t-25">
                    <h5 for="">Nombre</h5>
                   
                    <div class="col-lg-12">
                      <input  class="form-control" type="text" name="recurrente" id="recurrente" >
                    </div>
                    
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button class="btn ripple btn-primary" onclick="addrecurrent()"  data-dismiss="modal"  type="button">Agregar </button>
                  <button class="btn ripple btn-secondary" onclick="cerrar('modal-recurrente')" data-dismiss="modal" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
     
  </div>
</form>

@endsection
@include('layout.script')
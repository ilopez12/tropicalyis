const { forEachRight } = require("lodash");

moment.locale('es');
var cant_acomp = 0;
var cant_actual = 0;
function muestra(costo){

    document.getElementById('acomp').setAttribute("style", "display:block");
    var html = '<span class="badge rounded-pill badge-notification bg-danger"> B/.'+costo+'</span>';
    document.getElementById('carrito').innerHTML = html;

 
}

function adicionar(){

}

function muestrainp(){

    document.getElementById('orden_d').setAttribute("style", "display:block")
        $('#propia').val('NO');
}

function ocultainp(){
    document.getElementById('orden_d').setAttribute("style", "display:none")
    $('#propia').val('SI');

}

function agregaprot(){
    var id=  document.getElementById('numero').value;
    var id2 = parseInt(id) + 1;

    var html = '<tr>'+
        '<td id="p['+id2+']"><input type="text" class="form-control" name="proteina['+id2+']" id="proteina['+id2+']"></td>'+
        '<td id="c['+id2+']"><input type="text" class="form-control" name="costo['+id2+']" id="costo['+id2+']"></td>'+
        '<td id="a['+id2+']"><input type="text" class="form-control" name="adicionalP['+id2+']" id="adicionalP['+id2+']"></td>'+
        '<td id="cc['+id2+']"><input type="number" class="form-control" name="cantacomp['+id2+']" id="cantacomp['+id2+']" value="3" aria-describedby="basic-addon2"></td>'+
        '<td id="t['+id2+']">'+
        '    <select class="form-control" name="tipo['+id2+']" id="tipo['+id2+']">'+
        '        <option value="1">COMIDA COMPLETA</option>'+
        '        <option value="2">SOPA</option>'+
        '        <option value="3">GUACHO</option>'+
        '        <option value="4">LASAGNA</option>'+
        '        <option value="5">POSTRE</option>'+
        '    </select>'+
        '<input type="hidden" value="SI" name="incluir['+id2+']"  id="incluir['+id2+']">'+
        '</td>'+
        '<td id="cl['+id2+']"><input type="number" class="form-control" name="cantidad['+id2+']" id="cantidad['+id2+']" value="0" aria-describedby="basic-addon2"></td>'+
        '<td id="d['+id2+']"><a onclick="deleteprot('+id2+')" class="btn btn-success" style="color: white"><i class="fe fe-x-circle"></i></a></td>'
        '</tr>';
    document.getElementById('items').insertRow(-1).innerHTML = html;
    document.getElementById('numero').value = id2;
}

function deleteprot(id2){
    console.log('delete', id2)
        document.getElementById('proteina['+id2+']').value = null;
        document.getElementById('incluir['+id2+']').value = 'NO';
        document.getElementById('cl['+id2+']').setAttribute("style", "display:none");
        document.getElementById('btn['+id2+']').setAttribute("style", "display:none");
        document.getElementById('p['+id2+']').setAttribute("style", "display:none");
        document.getElementById('c['+id2+']').setAttribute("style", "display:none");
        document.getElementById('a['+id2+']').setAttribute("style", "display:none");
        document.getElementById('cc['+id2+']').setAttribute("style", "display:none");
        document.getElementById('t['+id2+']').setAttribute("style", "display:none");
        document.getElementById('d['+id2+']').setAttribute("style", "display:none")       ;
}

function deleteacomp(id2){
    document.getElementById('a2['+id2+']').setAttribute("style", "display:none")
    document.getElementById('c2['+id2+']').setAttribute("style", "display:none")
    document.getElementById('d2['+id2+']').setAttribute("style", "display:none")
    document.getElementById('entra['+id2+']').value = 'NO'
}
function agregaacomp(){
    
    var id=  document.getElementById('numeroA').value;
    var id2 = parseInt(id) + 1;

    var html = '<tr>'+
        '<td id="a2['+id2+']"><input type="text" class="form-control" name="acomp['+id2+']" id="proteina['+id2+']"></td>'+
        '<td id="c2['+id2+']"><input type="text" class="form-control" name="adicionalA['+id2+']" id="adicionalP['+id2+']"><input type="hidden" id="entra[0]" name="entra[0]" value="SI"></td>'+
        '<td id="d2['+id2+']"><a onclick="deleteacomp('+id2+')" class="btn btn-success" style="color: white"><i class="fe fe-x-circle"></i></a></td>'
    '</tr>';
    // document.getElementById('mostrar').setAttribute("style", "display:block")

    document.getElementById('items2').insertRow(-1).innerHTML = html;
    document.getElementById('numeroA').value = id2;
    console.log('TTT'+id);
}

function validafecha(info){
    var desde = document.getElementById('desde').value ;
    var hasta = document.getElementById('hasta').value ;
    var dia = document.getElementById('dia').value ;

    console.log(desde, hasta, dia,info)
    if(info == 'desde'){
        document.getElementById('hasta').removeAttribute('readonly')
    }
    if(info == 'hasta'){
        if(hasta < desde){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'la fecha para mostrar hasta no puede ser menor a la fecha para mostrar desde',
              })
              document.getElementById('hasta').value = "";

        }else{
            document.getElementById('dia').removeAttribute('readonly')
        }
       
    }else if(info == 'dia'){
        if(dia < desde || dia < hasta){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'la fecha de entrega de pedido no puede ser menor a la fecha de muestra del menu',
              })
              document.getElementById('dia').value = "";
        }
    }
}

function agregaacomp_2(){
    var id=  document.getElementById('numeroA').value;
    var id2 = parseInt(id) + 1;


    var nuevohijo = document.createElement('input');
    nuevohijo.className = 'form-control';
    nuevohijo.name = 'acomp['+id2+']';
    nuevohijo.id ='acomp['+id2+']';
    document.getElementById('child2').appendChild(nuevohijo);
    document.getElementById('child2').appendChild(document.createElement('br'));
    document.getElementById('numeroA').value = id2;

    var nuevohijo4 = document.createElement('input');
    nuevohijo4.className = 'form-control';
    nuevohijo4.name = 'costoA['+id2+']';
    nuevohijo4.id ='costoA['+id2+']';
    document.getElementById('child4').appendChild(nuevohijo4);
    document.getElementById('child4').appendChild(document.createElement('br'));

    var nuevohijo6 = document.createElement('input');
    nuevohijo6.className = 'form-control';
    nuevohijo6.name = 'adicionalA['+id2+']';
    nuevohijo6.id ='adicionalA['+id2+']';
    document.getElementById('child6').appendChild(nuevohijo6);
    document.getElementById('child6').appendChild(document.createElement('br'));
}
var resp;

function traepedidos(){
    var desde =  document.getElementById('desde').value;
    var hasta =  document.getElementById('hasta').value;
    var usuario =  document.getElementById('usuario').value;
    if(desde != '' && hasta == ''){
        Swal.fire({
            title: 'Error!',
            text: 'Debe seleccionar un rango de fechas para ver su lista de pedidos',
            icon: 'error',
            confirmButtonText: 'Enterado'
          })
    }else if(hasta != '' && desde == ''){
        Swal.fire({
            title: 'Error!',
            text: 'Debe seleccionar un rango de fechas para ver su lista de pedidos',
            icon: 'error',
            confirmButtonText: 'Enterado'
          })
    }else{
        console.log(desde+' hasta '+hasta);
        var formData  =new FormData();
            formData.append('desde', desde);
            formData.append('hasta', hasta);
            formData.append('usuario', usuario);
            formData.append('_token', $("input[name='_token']").val()); 
                $.ajax({
                    url: '/menu/getpedidos',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        resp =  response;
                        var table ='';
                        
                        for(var i = 0; i < resp.length; i++){
                            console.log(resp[i].solicitante);
                            html = '<tr>'+
                                        // '<td>'+resp[i].id+'</td>'+
                                        '<td>'+resp[i].solicitante+'</td>'+
                                        '<td>'+resp[i].fecha+'</td>'+
                                        '<td>'+resp[i].total_prot+'</td>'+
                                        '<td>'+resp[i].acomp_adc+'</td>'+
                                        '<td>'+resp[i].total+'</td>'+
                                        '<td>'+resp[i].enviado+'</td>'+
                                    '</tr>'
                        table =  table + html
                        }
    
                        document.getElementById('bodyt').innerHTML = table;
    
                    }}); 
    }

    
}
function traemenu(){

    var desde =  document.getElementById('desde').value;
    var hasta =  document.getElementById('hasta').value;
    if(desde == '' || hasta == ''){
        Swal.fire({
            title: 'Error!',
            text: 'Debe seleccionar un rango de fechas para ver su lista de menu',
            icon: 'error',
            confirmButtonText: 'Enterado'
          })
    }else{
        var formData  =new FormData();
            formData.append('desde', desde);
            formData.append('hasta', hasta);
            formData.append('_token', $("input[name='_token']").val()); 
                $.ajax({
                    url: '/admin/getmenu',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        resp =  response;
                        console.log(resp);
                        var table ='';
                        var proteina = [];
                        moment.locale('es');
                        for(var i = 0; i < resp.length; i++){
                           const date = moment(resp[i].fecha);
                           const day = moment.weekdays(date.day()); // Sábado
                           var dia = diaespanol(day);

                            if(resp[i].tipo == 'Proteina'){
                                proteina = resp[i].nombre
                                acomp = '-'
                            }else{
                                acomp =  resp[i].nombre  
                                proteina = '-'
                            }
                            html = '<tr>'+
                            '<td>'+moment(resp[i].fecha).format('D/MMM/YYYY')+'</td>'+
                            '<td>'+dia+'</td>'+
                            '<td>'+proteina+'</td>'+
                            '<td>'+acomp+'</td>'+
                            '</tr>';
                            table =  table +''+ html;
                        }
    
                        document.getElementById('bodyt').innerHTML = table;
    
                    }}); 
    }
    
}

function diaespanol(dia){
    var espan = '';
    switch (dia) {
        case 'Monday':
          //Declaraciones ejecutadas cuando el resultado de expresión coincide con el valor1
          espan = 'Lunes'
          break;
        case 'Tuesday':
          //Declaraciones ejecutadas cuando el resultado de expresión coincide con el valor2
          espan = 'Martes'
          break;
        case 'Wednesday':
            //Declaraciones ejecutadas cuando el resultado de expresión coincide con el valor2
            espan = 'Miércoles'
            break;
        case 'Thursday':
                //Declaraciones ejecutadas cuando el resultado de expresión coincide con el valor2
            espan = 'Jueves'
            break;
        case 'Friday':
          //Declaraciones ejecutadas cuando el resultado de expresión coincide con el valor2
          espan = 'Viernes'
          break;
        case 'Saturday':
            //Declaraciones ejecutadas cuando el resultado de expresión coincide con el valor2
            espan = 'Sabado'
            break;
        case 'Sunday':
                //Declaraciones ejecutadas cuando el resultado de expresión coincide con el valor2
            espan = 'Domingo'
            break;
        default:
          //Declaraciones ejecutadas cuando ninguno de los valores coincide con el valor de la expresión
          break;
    }

    return espan
}


function muestraacomp(){
    document.getElementById('mostrar').style.display = "block"; 
    
    // alert('tres');
}
function actualiza_costo(json_d, json_2, json_3){
    var html= '';
    var html2= '';
    json_2.forEach(function(element, indice) {
        if(json_d.restaurante == element.restaurante){
            html += '<tr><td><input type="checkbox" onclick="cantacomp('+indice+')" value="'+element.id+'" name="acomp['+indice+']" id="acomp['+indice+']"></td>'+
            '<td >'+element.nombre+'</td></tr>'
        }
    });
    
    json_2.forEach(function(element, indice) {
        if(json_d.restaurante == element.restaurante){
            html2 += '<tr><td  style="width: 60%"> <input class="" type="checkbox" value="'+element.id+'" name="adicional['+indice+']" id="adicional['+indice+']">'+element.nombre+' <span style="width: 60%; font-size: 12px; color:red"> + $'+parseFloat(element.costo_adicional).toFixed(2)+'</span> </td></tr>'
        }
    });
    json_3.forEach(function(element, indice) {
        if(json_d.restaurante == element.restaurante){
            html2 += '<tr><td  style="width: 60%"> <input class="" type="checkbox" value="'+element.id+'" name="adicional['+indice+']" id="adicional['+indice+']">'+element.nombre+' <span style="width: 60%; font-size: 12px; color:red"> + $'+parseFloat(element.costo_adicional).toFixed(2)+'</span> </td></tr>'
        }
    });
    


    document.getElementById('tbodyacom').innerHTML = html;
    document.getElementById('tbodyadicional').innerHTML = html2;
    $('#modal-acomp').modal('show');
    // $('#modal').modal('show');
        console.log(json_3);
        cant_acomp = json_d.cantAcomp;
        cant_actual = 0;
        console.log(cant_acomp);
        


}

function validacantidad(){
    console.log('valida',document.getElementById('pedido'))
    //$.ajax({
    //    url: '/menu/getcantidad',
    //    type: 'post',
    //    data: formData,
    //    contentType: false,
    //    processData: false,
    //    success: function(response) {
//
    //    }
//
    //});
}
function cerrar(id){
    $('#'+id).modal('hide');
}
function cambiaPass(id, cel, user){

    const numero =  cel.toString()
    const pass = numero.substring(numero.length -4)
    
    document.getElementById("pass").innerText = pass
    document.getElementById("ultimos").value = pass
    document.getElementById("id").value = user
    
    $('#'+id).modal('show');
}

function agregar(){
    
    var solicitante = $('#propia').val();
    var fecha = $('#verhasta').val();
    var n_solicitante = $('#orden_dee').val(); 

    if(solicitante == 'NO' && n_solicitante == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops... Solicitud para otra persona',
            text: 'Debe ingresar el nombre del solicitante ',
          })
    }else{
        var formData  =new FormData(document.getElementById("pedido"));
        // formData.append('orden_de', document.getElementById("pedido"));
        $.ajax({
            url: '/menu/agregarpedido',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                resp =  response;
                $('#modal-acomp').modal('hide');
                    $('#modal-datepicker').modal('hide');
                    $('#modal-cant').modal('hide');
                if(response == true){
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Pedido agregado a Carrito',
                        text: '',
                      }).then((result) => {
                        $('#modal-datepicker').modal('hide');
                        $('#modal-acomp').modal('hide');
                        window.location.href = '/menu';
                      });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'No se ha podido agregar su orden',
                        text: '',
                      }).then((result) => {
                        window.location.href = '/menu';
                      });
                }
                
            }}); 
    }
    // console.log(document.getElementById('pedido'));
}

function eliminarcarrito(id){

    window.location.href = '/menu/deletepedido/'+id;
    
}

function cantacomp(id){
    console.log(id);
    if (document.getElementById('acomp['+id+']').checked == true){
        if (cant_actual < cant_acomp ){
            cant_actual = cant_actual +1;
        }else{
            $('#modal-acomp').modal('hide');
            document.getElementById('acomp['+id+']').checked = false;
            Swal.fire({
                title: 'Importante!',
                text: 'Cantidad de Acompañamientos excedidos',
                icon: 'warning',
                confirmButtonText: 'Enterado'
              })

        }
    }else{
        cant_actual = cant_actual - 1;
    }
    
}

function ordenar(){
    window.location.href = '/menu/ordenar';
}

function ordenardirecto(){
    var solicitante = $('#propia').val();
    var fecha = $('#verhasta').val();
    var n_solicitante = $('#orden_d').val(); 

    if(solicitante == 'NO' && n_solicitante == ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops... Solicitud para otra persona',
            text: 'Debe ingresar el nombre del solicitante ',
          })
    }else{
        var formData  =new FormData(document.getElementById("pedido"));

        $.ajax({
            url: '/menu/ordenar',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                resp =  response;
                if(response == true){
                    Swal.fire({
                        icon: 'success',
                        title: 'Pedido agregado a Carrito',
                        text: '',
                      }).then((result) => {
                        window.location.href = '/menu';
                      });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'No se ha podido agregar su orden',
                        text: '',
                      }).then((result) => {
                        window.location.href = '/menu';
                      });
                }
                
            }}); 
    }
}
function validausuario(){
    var celular = $('#email').val();
    var formData  =new FormData();
    formData.append('celular', celular);
    formData.append('_token', $("input[name='_token']").val()); 
    $.ajax({
        url: '/valida_celular',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            resp =  response;
            if(resp.length != ''){
                swal("Usuario Existente!", "Este celular ya ha sido registrado", "warning");
            }
          
        }}); 

}

function verificafecha(){
    $('#modal-datepicker').modal('show');
}

function ver(){
   var orden = $('#orden_dee').val();
   console.log(orden);
   if(orden == 1){
        $('#modal-recurrente').modal('show');
   }
}

function addrecurrent(){
    var orden = $('#orden_dee').val();
    


    var formData  =new FormData();
        formData.append('_token', $("input[name='_token']").val()); 
        formData.append('recurrente', document.getElementById("recurrente").value); 
        $.ajax({
            url: '/admin/recurrente',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#modal-recurrente').modal('hide');
                var aficiones = document.getElementById("orden_dee");
                var inputAficion =  document.getElementById("recurrente").value;
                var option = document.createElement("option");
                option.text = inputAficion;
                aficiones.add(option);
            }
        });
    
}

function muestranumero(){

    const numero = document.getElementById("celular").value
    console.log(numero);
    if(numero.length < 8 ){
        swal("Celular incorrecto!", "Formato de celular incorrecto, Favor Validar que cuente con 8 números", "warning");
        document.getElementById("celular").focus()
    }else if(numero.length > 8 ){
        swal("Celular incorrecto!", "Formato de celular incorrecto, Favor Validar que cuente con 8 números", "warning");
        document.getElementById("celular").focus()
    }else{
        // VALIDAR SI EXISTE EL CELULAR 
        var formData  =new FormData();
        formData.append('_token', $("input[name='_token']").val()); 
        formData.append('celular', numero); 
        $.ajax({
            url: '/admin/validacelular',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               console.log(response);
               if(response == 1){
                swal("Celular Existente!", "Este celular ya existe en el sistema", "warning");
                document.getElementById("celular").value = ''
               }else{
                    // AGREGAR AL PASS

                    const pass = numero.substring(numero.length -4)
                    console.log(pass);
                    document.getElementById("pass").innerText = pass
                    document.getElementById("ultimos").value = pass
               }
            }
        });
        
    }
}

function actualizapass(){
    const id = document.getElementById("id").value
    const ultimos = document.getElementById("ultimos").value
    const pass = document.getElementById("contrasena").value

    if(pass == ''){
        swal("Contraseña en Blanco!", "Debe agregar caracteres en el campo Nueva Contraseña", "warning");
    }

    var formData  =new FormData();
        formData.append('_token', $("input[name='_token']").val()); 
        formData.append('id', id); 
        formData.append('ultimos', ultimos); 
        formData.append('pass', pass); 
        $.ajax({
            url: '/admin/resetpass',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if(response == 1){
                    swal("Ops!", "Ha ocurrido un error, favor vuelta a intentarlo", "error");
                }else{
                    swal({
                        title: "Contraseña Actualizada!",     
                        icon: "success",
                        button: {
                            text: "Ok!",
                            closeModal: false,
                        },
                        });
                        location.reload();
                }
            }
        });
}

function bloqueo(id, actual){
    let mensaje = ''
    let encabezado = ''
    let mensaje2 = ''
    if(actual == 1){
         mensaje = 'Esta seguro que desea desbloquear este usuario'
         encabezado = 'Desbloquear Usuario'
         mensaje2 = 'Se ha desbloqueado el usuario'
    }else{
        mensaje = 'Esta seguro que desea bloquear este usuario'
        encabezado = 'Bloquear Usuario'
        mensaje2 = 'Se ha bloqueado el usuario'
    }
    Swal.fire({
        title: encabezado,
        text: mensaje,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Proceder"
      }).then((result) => {
        if (result.isConfirmed) {
            var formData  =new FormData();
            formData.append('_token', $("input[name='_token']").val()); 
            formData.append('id', id); 
            formData.append('actual', actual); 
            $.ajax({
                url: '/admin/bloqueo',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if(response == 0){
                        Swal.fire({
                            title: "Actualizado!",
                            text: mensaje2,
                            icon: "success"
                          });
                          location.reload();
                    }
                }
            });

         
        }
      });
}

function actualizaestado(id, actual){
    let mensaje = ''
    let encabezado = ''
    let mensaje2 = ''
    if(actual == 'INACTIVO'){
         mensaje = 'Esta seguro que desea activar este usuario '
         encabezado = 'Activar Usuario'
         mensaje2 = 'Se ha Activado el usuario'
    }else{
        mensaje = 'Esta seguro que desea desactivar este usuario'
        encabezado = 'Desactivar Usuario'
        mensaje2 = 'Se ha desactivado el usuario'
    }
    Swal.fire({
        title: encabezado,
        text: mensaje,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Proceder"
      }).then((result) => {
        if (result.isConfirmed) {
            var formData  =new FormData();
            formData.append('_token', $("input[name='_token']").val()); 
            formData.append('id', id); 
            formData.append('actual', actual); 
            $.ajax({
                url: '/admin/updateuser',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if(response == 0){
                        Swal.fire({
                            title: "Actualizado!",
                            text: mensaje2,
                            icon: "success"
                          });
                          location.reload();
                    }
                }
            });

         
        }
      });
}

function addfavorito(id){

    // LLENAR CAMPOS
    document.getElementById("id_principal").value = id
    var formData  =new FormData();
    formData.append('_token', $("input[name='_token']").val()); 
    formData.append('id', id); 
    $.ajax({
        url: '/admin/favoritos',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response);

            if(response.length > 0){
                var td = '';
                response.forEach(function(element, indice) {
                    td += '<tr>'+
                    '<td>'+element.nombre+'</td>'+
                    '<td>'+element.descript+'</td>'+
                    '<td>'+
                    '<select class="form-control select-sm select2-no-search" id="row'+element.id+'" name="row'+element.id+'">';
                    if(element.estado == 'ACTIVO'){
                        td +='<option value="ACTIVO" selected>ACTIVO</option>'+
						'<option value="INACTIVO">INACTIVO</option>'
                    } else{
                        td +='<option value="ACTIVO" >ACTIVO</option>'+
						'<option value="INACTIVO" selected>INACTIVO</option>'
                    }
                    
                    td +='</select>'+
                    '</td>'+
                    // '<td>'+element.estado+'</td>'+
                    '<td><a style="color: white" onclick="actualizafavorito('+element.id+')" data-placement="bottom" data-toggle="tooltip" title="Activar" class="btn ripple btn-success btn-icon">'+
                    '<i class="si si-check"></i></td>'+
                    '</tr>'      
                });
                
               
                document.getElementById("tbody").innerHTML = td
            }
        }
    });

    $('#modal2').modal('show');
}

function agregarFav(){
    var nombre = document.getElementById('favorito').value
    var descript = document.getElementById('desc').value
    if(nombre == '' || descript == ''){
        swal("Ops!", "Debe llenar los campos", "error");
    }else{
        var id = document.getElementById("id_principal").value 
        var formData  =new FormData();
        formData.append('_token', $("input[name='_token']").val()); 
        formData.append('id', id); 
        formData.append('nombre', nombre); 
        formData.append('descript', descript); 
        $.ajax({
            url: '/admin/addfavoritos',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response == 0){
                    swal("Favorito Agregado!", "Se ha añadido un favorito a este usuario", "success");
                    location.reload();
                }else{
                    swal("Ops!", "Ha ocurrido un error, favor vuelta a intentarlo", "error");
                    location.reload();
                }
            }
        });
    }
   
}

function actualizafavorito(id){
    var elementid = 'row'+id
    var estado = document.getElementById(elementid).value

    var formData  =new FormData();
    formData.append('_token', $("input[name='_token']").val()); 
    formData.append('id', id); 
    formData.append('estado', estado); 
    $.ajax({
        url: '/admin/actualizaFav',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if(response == 1){
                swal("Ops!", "Ha ocurrido un error, favor vuelta a intentarlo", "error");
            }else{
                swal({
                    title: "Favorito Actualizado!",     
                    icon: "success",
                    button: {
                        text: "Ok!",
                        closeModal: false,
                    },
                    });
                    location.reload();
            }
        }
    });
   
}

function abrir(id){
    $('#modal-acomp').modal('hide');
    $('#'+id).modal('show');
}
function abrir2(id){
    $('#modal-cant').modal('hide');
    $('#'+id).modal('show');
}
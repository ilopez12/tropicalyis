<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enc_pedido extends Model
{
    protected $table= 'enc_pedido';
    public $timestamps = false;
    use HasFactory;

    public static function insertenc($datos){
        // dd($datos);
        $tabla = new enc_pedido();

        $tabla->propia = $datos->propia;
        $tabla->agregado = 'NO';
        $tabla->usuario = $datos->usuario;
        $tabla->solicitante = $datos->solicitante;
        $tabla->fecha = $datos->fecha;
        $tabla->total_prot = $datos->total_prot;
        $tabla->prot_adc = $datos->prot_adc;
        $tabla->acomp_adc = $datos->acomp_adc;
        $tabla->total = $datos->total;
        $tabla->cantidad = $datos->cantidad;
        $tabla->restaurante = $datos->restaurante;
        $tabla->dato_adicional = $datos->datos_adicionales;
        
        $tabla->save();

        return $tabla;   
    }
    public static function insertdirecto($datos){
        // dd($datos);
        $tabla = new enc_pedido();

        $tabla->propia = $datos['propia'];
        $tabla->agregado = 'SI';
        $tabla->usuario = $datos['usuario'];
        $tabla->solicitante = $datos['solicitante'];
        $tabla->fecha = $datos['fecha'];
        $tabla->total_prot = $datos['total_prot'];
        $tabla->prot_adc = $datos['prot_adc'];
        $tabla->acomp_adc = $datos['acomp_adc'];
        $tabla->total = $datos['total'];
        $tabla->dato_adicional = $datos['datos_adicionales'];
        
        $tabla->save();

        return $tabla;   
    }
    public static function getbyday(){
       
        $date1 = Carbon::parse(date(now()));
        $date1 = $date1->subDay();
        $date2 = Carbon::parse(date(now()));
        $date2 = $date2->addDay();
       
        $query = enc_pedido::where('fecha', '>', $date1)
                                ->where('fecha', '<', $date2)
                                ->get();

        return $query;
      
    }
    public static function getpedidosday($date){
        $query = enc_pedido::where('dia', '=', $date)
                            ->orderBy('usuario')
                            ->get();

        return $query;
      
    }

    public static function getnoenviadosday($date){
        $query = enc_pedido::where('dia', '=', $date)
                            ->where(function($query) {
                                $query->where('enviado', '=', 'NO')
                                    ->orWhereNull('enviado'); // Agrega la condición de enviado IS NULL
                            })
                            ->orderBy('usuario')
                            ->get();

        return $query;
      
    }

    public static function updatedenviados($id){
        $tabla = enc_pedido::find($id);

        $tabla->enviado = 'SI';

        $tabla->save();

        return $tabla;
    }
    public static function getbyrango($desde, $hasta){
        $date1 = Carbon::parse($desde);
        $date1 = $date1->subDay();
        $date2 = Carbon::parse($hasta);
        $date2 = $date2->addDay();
        // dd();
        $query = enc_pedido::where('fecha', '>=', $date1)
                                ->where('fecha', '<=', $date2)
                                ->get();

        return $query;
      
    }
    public static function getbyrangoUser($desde, $hasta, $usuario){
        $date1 = Carbon::parse($desde);
        $date1 = $date1->subDay();
        $date2 = Carbon::parse($hasta);
        $date2 = $date2->addDay();
        // dd();
        $query = enc_pedido::where('fecha', '>=', $date1)
                                ->where('fecha', '<=', $date2)
                                ->where('usuario', '<=', $usuario)
                                ->get();

        return $query;
      
    }
    public static function getbyusuario( $usuario){
       
        $query = enc_pedido::where('usuario', '<=', $usuario)
                                ->get();

        return $query;
      
    }
  
    public static function getall($usuario){
        $query = enc_pedido::where('usuario', $usuario)
                                ->get();

        return $query;
    }
    public static function getfiltro($usuario, $desde, $hasta){
        $query = enc_pedido::where('usuario', $usuario)
                            ->where('fecha', '>=',$desde)                            
                            ->where('fecha', '<=',$hasta)
                            ->get();

        return $query;
    }
        
    public static function getenviados(){
       
        $date1 = Carbon::parse(date(now()));
        $date1 = $date1->subDay();
        $date2 = Carbon::parse(date(now()));
        $date2 = $date2->addDay();
       
        $query = enc_pedido::where('agregado', 'SI')
                                ->where('fecha', '>', $date1)
                                ->where('fecha', '<', $date2)
                                ->get();

        return $query;
      
    }
  
}



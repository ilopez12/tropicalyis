<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table= 'menu';
    public $timestamps = false;
    use HasFactory;


    public static function getmenu($date){
        // dd( $date);
        
        $query = Menu::where('fecha', '=',$date)
                    ->where('tipo', 'Proteina')
                    ->get();

       return $query;
    }

    public static function getmenuprincipal($date){
        //dd( $date);
        
        $query = Menu::where('verdesde', '<=',$date)
                    ->where('verhasta', '>=',$date)                    
                    ->where('tipo', 'Proteina')
                    ->get();

       return $query;
    }

    public static function allMenu($date){
        $query = Menu::where('fecha', '=',$date)
                    ->get();

       return $query;
    }

    public static function getmenubyId($id){
        $query = Menu::where('id',$id)
                    ->first();

       return $query;
    }

    public static function getacomp($date){
        // dd( $date);
        
        $query = Menu::where('fecha', '=',$date)
                    ->where('tipo', 'Acomp')
                    ->get();

       return $query;
    }
    public static function getacompprincipal($date){
        // dd( $date);
        
        $query = Menu:: where('verdesde', '<=',$date)
                        ->where('verhasta', '>=',$date)
                        ->where('tipo', 'Acomp')
                        ->get();

       return $query;
    }
        
    public static function getbyRango($desde, $hasta){
        // dd($desde, $hasta);
        $query = Menu::where('fecha', '>', $desde)
                    ->where('fecha', '<', $hasta)
                    ->orderByDesc('tipo')
                    ->get();

       return $query;
    }

    public static function create($datos){
        $desde = $datos['desde'];
        $tabla = new Menu();
        $tabla->fecha = date(now());
        $tabla->tipo = $datos['tipo'];
        $tabla->nombre =  $datos['nombre'];
        $tabla->created_at = date(now());
        $tabla->create_by =  $datos['create'];
        $tabla->verdesde =  $desde;
        $tabla->verhasta =  $datos['hasta'];
        $tabla->dia =  $datos['dia'];
        $tabla->costo =  $datos['costo'];
        $tabla->costo_adicional =  $datos['adicional'];
        $tabla->restaurante =  $datos['restaurante'];
        $tabla->cantAcomp =  $datos['cantAcomp'];
        $tabla->tipo_comida =  $datos['tipo_comida'];       
        $tabla->cantidad =  $datos['cantidad'];

        
        $tabla->save();
        // dd('$desde');

        return $tabla;
    }
}
